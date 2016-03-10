/**
 * 
 */
var app = angular.module('app',['ui.router'],['$httpProvider',function($httpProvider){
	
	/**
	   * The workhorse; converts an object to x-www-form-urlencoded serialization.
	   * @param {Object} obj
	   * @return {String}
	   */ 
	$httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
	var param = function(obj) {var query = '', name, value, fullSubName, subName, subValue, innerObj, i;for(name in obj) {value = obj[name];if(value instanceof Array) {for(i=0; i<value.length; ++i) {subValue = value[i];fullSubName = name + '[' + i + ']';innerObj = {};innerObj[fullSubName] = subValue;query += param(innerObj) + '&';}}else if(value instanceof Object) {for(subName in value) {subValue = value[subName];fullSubName = name + '[' + subName + ']';innerObj = {};innerObj[fullSubName] = subValue;query += param(innerObj) + '&';}}else if(value !== undefined && value !== null)query += encodeURIComponent(name) + '=' + encodeURIComponent(value) + '&';}return query.length ? query.substr(0, query.length - 1) : query;};

	// Override $http service's default transformRequest
	$httpProvider.defaults.transformRequest = [function(data) {
		return angular.isObject(data) && String(data) !== '[object File]' ? param(data) : data;
	}];
}]);

//config
app.config(['$stateProvider','$urlRouterProvider',function($stateProvider,$urlRouterProvider){
	
	//默认路由
	$urlRouterProvider.otherwise('/');
	
	$stateProvider.state('home',{
		url:'/',
		templateUrl:'home.html',
		controller:'documentListController',
	})
	
	.state('detail',{
		url:'/detail/{id}/{hash}',
		templateUrl:'detail.html',
		controller:'documentDetailController',
	})
}]);

/*=======================controllers============================*/

app.controller('documentListController',['$scope','$http','$q','$sce','documentPageFactory','documentTagsFactory','documentDataFactory',function($scope,$http,$q,$sce,documentPageFactory,documentTagsFactory,documentDataFactory){
	
	var pageList = function(page)
	{
			documentPageFactory.query(page).then(function(response){
			
				//分页列表
				$scope.lists = response.models;
				
				//下一个分页数
				$scope.next_page = parseInt(response.page_json.current_page)+1;

				//tags
				documentTagsFactory.query(documentPageFactory.ids).then(function(response){
					$scope.tags = response;
				})
			
				
				documentDataFactory.query(documentPageFactory.ids,documentPageFactory.hashs).then(function(response){
					$scope.datas = response;
				});
		});
	}
	
	$scope.nextPage = function(page)
	{
		pageList(page);
	}
	
	pageList(1);
	
}]);

//
app.controller('documentDetailController',['$scope','$http','$sce','$stateParams','documentDetail',function($scope,$http,$sce,$stateParams,documentDetail){
	
	documentDetail.query($stateParams.id,$stateParams.hash).then(function(response){
		
		$scope.model = response;
		
		//不过滤html标签  	ng-bind-html="content"
		$scope.content = $sce.trustAsHtml(response.has_one_document_data.content);
	});
	
}]);


/*===================================factory===========================*/
//factory 使用于功能简单，类似于单例的一样，service适用于逻辑处理比较复杂的方法

//文档分页列表
app.factory('documentPageFactory',['$http','$q',function($http,$q){
	var documentPageFactory = {
		ids:[],
		hashs:[],
		query:function(page){
			page = page || 1;
			//申明一个延迟
			var deferred = $q.defer();
			
			//http数据获取
			$http.get(url('document/api/page'),{
				'page':page
			})
			.success(function(response){
				//获取所有的ids
				angular.forEach(response.data.models,function(values){
					documentPageFactory.ids.push(values.id);
					documentPageFactory.hashs.push(values.hash);
				});
				
				//解析documents
				deferred.resolve(response.data);
			})
			.error(function(response){
				deferred.reject(response);
			});
			
			return deferred.promise;
		}
	}
	return documentPageFactory;
}]);
	
//文档内容
app.factory('documentDataFactory',['$http','$q',function($http,$q){
	var documentDataFactory = {
		stripTagsData:[],
		query:function(ids,hashs){
			var deferred = $q.defer();
			
			$http.post(url('document/api/document-data'),{
				'id':ids,
				'hash':hashs,
			})
			.success(function(response){
				/* angular.forEach(response.data.data,function(item){
					item.content = strip_tags(item);
					documentDataFactory.stripTagsData.push(item);
				}); */
				var models = response.data.models;
				if(models)
				{
					var newModels = {};
					angular.forEach(models,function(model){
						newModels[model.did] = model;
					})	
					deferred.resolve(newModels);
				}
				else
				{
					deferred.resolve(models);	
				}
				
			})
			.error(function(response){
				deferred.reject(response);
			})
			
			return deferred.promise;
		}
	};
	return documentDataFactory;
}]);
	
//文档标签
app.factory('documentTagsFactory',['$http','$q','documentPageFactory',function($http,$q,documentPageFactory){
	//申明一个延迟
	return {
		query:function(ids)
		{
			var deferred = $q.defer();
			
			$http.post('http://3.cs/index.php/tags/assoc-tags',{
				'id':documentPageFactory.documentIds,
				'model':'Document\\Models\\Document'
			})
			.success(function(response){
				deferred.resolve(response.data.tags);
			})
			.error(function(response){
				deferred.reject(response);
			});
			
			return deferred.promise;
		}
	}
}]);
	
//文档详情
app.factory('documentDetailFactory',['$http','$q',function($http,$q){
	var documentDetailFactory = {
			query:function(id,hash)
			{
				//申明一个延迟
				var deferred = $q.defer();
				
				$http.post(url('document/api/show'),{
					'id':id,
					'hash':hash,
				}).success(function(response){
					deferred.resolve(response.data.model);
				}).error(function(response){
					deferred.reject(response);
				})
				
				return deferred.promise;
			}
	};
	return documentDetailFactory;
}]);
	
	
	