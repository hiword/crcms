<?php
namespace Simon\File\Uploads;
use Simon\File\Uploads\Exceptions\TypeErrorException;
use Simon\File\Uploads\Exceptions\SizeException;
use Simon\File\Uploads\Exceptions\UploadException;
class FileUpload 
{
	
	/**
	 * 获取的新文件
	 * @var array
	 * @author simon
	 */
	protected $files = [];
	
	/**
	 * File\Uploads\File 对象
	 * @var object
	 * @author simon
	 */
	protected $file = null;
	
	/**
	 * 允许上传的文件大小[字节]
	 * @var numeric  
	 * @author simon
	 */
	protected $filesize = 2097152;//2MB//ok//2097152
	
	/**
	 * 文件上传路径
	 * @var string
	 * @author simon
	 */
	protected $path = './uploads';
	
	/**
	 * 上传中的数据数组
	 * @var array
	 * @author simon
	 */
	protected $uploading = [];
	
	/**
	 * 允许的文件扩展名
	 * @var array
	 * @author simon
	 */
	protected $extensions = ['jpg','jpeg','gif','png','bmp'];//ok
	
	/**
	 * 是否验证文件扩展名
	 * @var boolean
	 * @author simon
	 */
	protected $checkExtension = true;//ok
	
	/**
	 * 是否验证mime类型
	 * @var boolean
	 * @author simon
	 */
	protected $checkMime = true;//ok
	
	/**
	 * 允许的文件mime类型
	 * @var array
	 * @author simon
	 */
	protected $mimes = [
			'application/andrew-inset' => 'ez',
			'application/applixware' => 'aw',
			'application/atom+xml' => 'atom',
			'application/atomcat+xml' => 'atomcat',
			'application/atomsvc+xml' => 'atomsvc',
			'application/ccxml+xml' => 'ccxml',
			'application/cdmi-capability' => 'cdmia',
			'application/cdmi-container' => 'cdmic',
			'application/cdmi-domain' => 'cdmid',
			'application/cdmi-object' => 'cdmio',
			'application/cdmi-queue' => 'cdmiq',
			'application/cu-seeme' => 'cu',
			'application/davmount+xml' => 'davmount',
			'application/docbook+xml' => 'dbk',
			'application/dssc+der' => 'dssc',
			'application/dssc+xml' => 'xdssc',
			'application/ecmascript' => 'ecma',
			'application/emma+xml' => 'emma',
			'application/epub+zip' => 'epub',
			'application/exi' => 'exi',
			'application/font-tdpfr' => 'pfr',
			'application/gml+xml' => 'gml',
			'application/gpx+xml' => 'gpx',
			'application/gxf' => 'gxf',
			'application/hyperstudio' => 'stk',
			'application/inkml+xml' => 'ink',
			'application/ipfix' => 'ipfix',
			'application/java-archive' => 'jar',
			'application/java-serialized-object' => 'ser',
			'application/java-vm' => 'class',
			'application/javascript' => 'js',
			'application/json' => 'json',
			'application/jsonml+json' => 'jsonml',
			'application/lost+xml' => 'lostxml',
			'application/mac-binhex40' => 'hqx',
			'application/mac-compactpro' => 'cpt',
			'application/mads+xml' => 'mads',
			'application/marc' => 'mrc',
			'application/marcxml+xml' => 'mrcx',
			'application/mathematica' => 'ma',
			'application/mathml+xml' => 'mathml',
			'application/mbox' => 'mbox',
			'application/mediaservercontrol+xml' => 'mscml',
			'application/metalink+xml' => 'metalink',
			'application/metalink4+xml' => 'meta4',
			'application/mets+xml' => 'mets',
			'application/mods+xml' => 'mods',
			'application/mp21' => 'm21',
			'application/mp4' => 'mp4s',
			'application/msword' => 'doc',
			'application/mxf' => 'mxf',
			'application/octet-stream' => 'bin',
			'application/oda' => 'oda',
			'application/oebps-package+xml' => 'opf',
			'application/ogg' => 'ogx',
			'application/omdoc+xml' => 'omdoc',
			'application/onenote' => 'onetoc',
			'application/oxps' => 'oxps',
			'application/patch-ops-error+xml' => 'xer',
			'application/pdf' => 'pdf',
			'application/pgp-encrypted' => 'pgp',
			'application/pgp-signature' => 'asc',
			'application/pics-rules' => 'prf',
			'application/pkcs10' => 'p10',
			'application/pkcs7-mime' => 'p7m',
			'application/pkcs7-signature' => 'p7s',
			'application/pkcs8' => 'p8',
			'application/pkix-attr-cert' => 'ac',
			'application/pkix-cert' => 'cer',
			'application/pkix-crl' => 'crl',
			'application/pkix-pkipath' => 'pkipath',
			'application/pkixcmp' => 'pki',
			'application/pls+xml' => 'pls',
			'application/postscript' => 'ai',
			'application/prs.cww' => 'cww',
			'application/pskc+xml' => 'pskcxml',
			'application/rdf+xml' => 'rdf',
			'application/reginfo+xml' => 'rif',
			'application/relax-ng-compact-syntax' => 'rnc',
			'application/resource-lists+xml' => 'rl',
			'application/resource-lists-diff+xml' => 'rld',
			'application/rls-services+xml' => 'rs',
			'application/rpki-ghostbusters' => 'gbr',
			'application/rpki-manifest' => 'mft',
			'application/rpki-roa' => 'roa',
			'application/rsd+xml' => 'rsd',
			'application/rss+xml' => 'rss',
			'application/rtf' => 'rtf',
			'application/sbml+xml' => 'sbml',
			'application/scvp-cv-request' => 'scq',
			'application/scvp-cv-response' => 'scs',
			'application/scvp-vp-request' => 'spq',
			'application/scvp-vp-response' => 'spp',
			'application/sdp' => 'sdp',
			'application/set-payment-initiation' => 'setpay',
			'application/set-registration-initiation' => 'setreg',
			'application/shf+xml' => 'shf',
			'application/smil+xml' => 'smi',
			'application/sparql-query' => 'rq',
			'application/sparql-results+xml' => 'srx',
			'application/srgs' => 'gram',
			'application/srgs+xml' => 'grxml',
			'application/sru+xml' => 'sru',
			'application/ssdl+xml' => 'ssdl',
			'application/ssml+xml' => 'ssml',
			'application/tei+xml' => 'tei',
			'application/thraud+xml' => 'tfi',
			'application/timestamped-data' => 'tsd',
			'application/vnd.3gpp.pic-bw-large' => 'plb',
			'application/vnd.3gpp.pic-bw-small' => 'psb',
			'application/vnd.3gpp.pic-bw-var' => 'pvb',
			'application/vnd.3gpp2.tcap' => 'tcap',
			'application/vnd.3m.post-it-notes' => 'pwn',
			'application/vnd.accpac.simply.aso' => 'aso',
			'application/vnd.accpac.simply.imp' => 'imp',
			'application/vnd.acucobol' => 'acu',
			'application/vnd.acucorp' => 'atc',
			'application/vnd.adobe.air-application-installer-package+zip' => 'air',
			'application/vnd.adobe.formscentral.fcdt' => 'fcdt',
			'application/vnd.adobe.fxp' => 'fxp',
			'application/vnd.adobe.xdp+xml' => 'xdp',
			'application/vnd.adobe.xfdf' => 'xfdf',
			'application/vnd.ahead.space' => 'ahead',
			'application/vnd.airzip.filesecure.azf' => 'azf',
			'application/vnd.airzip.filesecure.azs' => 'azs',
			'application/vnd.amazon.ebook' => 'azw',
			'application/vnd.americandynamics.acc' => 'acc',
			'application/vnd.amiga.ami' => 'ami',
			'application/vnd.android.package-archive' => 'apk',
			'application/vnd.anser-web-certificate-issue-initiation' => 'cii',
			'application/vnd.anser-web-funds-transfer-initiation' => 'fti',
			'application/vnd.antix.game-component' => 'atx',
			'application/vnd.apple.installer+xml' => 'mpkg',
			'application/vnd.apple.mpegurl' => 'm3u8',
			'application/vnd.aristanetworks.swi' => 'swi',
			'application/vnd.astraea-software.iota' => 'iota',
			'application/vnd.audiograph' => 'aep',
			'application/vnd.blueice.multipass' => 'mpm',
			'application/vnd.bmi' => 'bmi',
			'application/vnd.businessobjects' => 'rep',
			'application/vnd.chemdraw+xml' => 'cdxml',
			'application/vnd.chipnuts.karaoke-mmd' => 'mmd',
			'application/vnd.cinderella' => 'cdy',
			'application/vnd.claymore' => 'cla',
			'application/vnd.cloanto.rp9' => 'rp9',
			'application/vnd.clonk.c4group' => 'c4g',
			'application/vnd.cluetrust.cartomobile-config' => 'c11amc',
			'application/vnd.cluetrust.cartomobile-config-pkg' => 'c11amz',
			'application/vnd.commonspace' => 'csp',
			'application/vnd.contact.cmsg' => 'cdbcmsg',
			'application/vnd.cosmocaller' => 'cmc',
			'application/vnd.crick.clicker' => 'clkx',
			'application/vnd.crick.clicker.keyboard' => 'clkk',
			'application/vnd.crick.clicker.palette' => 'clkp',
			'application/vnd.crick.clicker.template' => 'clkt',
			'application/vnd.crick.clicker.wordbank' => 'clkw',
			'application/vnd.criticaltools.wbs+xml' => 'wbs',
			'application/vnd.ctc-posml' => 'pml',
			'application/vnd.cups-ppd' => 'ppd',
			'application/vnd.curl.car' => 'car',
			'application/vnd.curl.pcurl' => 'pcurl',
			'application/vnd.dart' => 'dart',
			'application/vnd.data-vision.rdz' => 'rdz',
			'application/vnd.dece.data' => 'uvf',
			'application/vnd.dece.ttml+xml' => 'uvt',
			'application/vnd.dece.unspecified' => 'uvx',
			'application/vnd.dece.zip' => 'uvz',
			'application/vnd.denovo.fcselayout-link' => 'fe_launch',
			'application/vnd.dna' => 'dna',
			'application/vnd.dolby.mlp' => 'mlp',
			'application/vnd.dpgraph' => 'dpg',
			'application/vnd.dreamfactory' => 'dfac',
			'application/vnd.ds-keypoint' => 'kpxx',
			'application/vnd.dvb.ait' => 'ait',
			'application/vnd.dvb.service' => 'svc',
			'application/vnd.dynageo' => 'geo',
			'application/vnd.ecowin.chart' => 'mag',
			'application/vnd.enliven' => 'nml',
			'application/vnd.epson.esf' => 'esf',
			'application/vnd.epson.msf' => 'msf',
			'application/vnd.epson.quickanime' => 'qam',
			'application/vnd.epson.salt' => 'slt',
			'application/vnd.epson.ssf' => 'ssf',
			'application/vnd.eszigno3+xml' => 'es3',
			'application/vnd.ezpix-album' => 'ez2',
			'application/vnd.ezpix-package' => 'ez3',
			'application/vnd.fdf' => 'fdf',
			'application/vnd.fdsn.mseed' => 'mseed',
			'application/vnd.fdsn.seed' => 'seed',
			'application/vnd.flographit' => 'gph',
			'application/vnd.fluxtime.clip' => 'ftc',
			'application/vnd.framemaker' => 'fm',
			'application/vnd.frogans.fnc' => 'fnc',
			'application/vnd.frogans.ltf' => 'ltf',
			'application/vnd.fsc.weblaunch' => 'fsc',
			'application/vnd.fujitsu.oasys' => 'oas',
			'application/vnd.fujitsu.oasys2' => 'oa2',
			'application/vnd.fujitsu.oasys3' => 'oa3',
			'application/vnd.fujitsu.oasysgp' => 'fg5',
			'application/vnd.fujitsu.oasysprs' => 'bh2',
			'application/vnd.fujixerox.ddd' => 'ddd',
			'application/vnd.fujixerox.docuworks' => 'xdw',
			'application/vnd.fujixerox.docuworks.binder' => 'xbd',
			'application/vnd.fuzzysheet' => 'fzs',
			'application/vnd.genomatix.tuxedo' => 'txd',
			'application/vnd.geogebra.file' => 'ggb',
			'application/vnd.geogebra.tool' => 'ggt',
			'application/vnd.geometry-explorer' => 'gex',
			'application/vnd.geonext' => 'gxt',
			'application/vnd.geoplan' => 'g2w',
			'application/vnd.geospace' => 'g3w',
			'application/vnd.gmx' => 'gmx',
			'application/vnd.google-earth.kml+xml' => 'kml',
			'application/vnd.google-earth.kmz' => 'kmz',
			'application/vnd.grafeq' => 'gqf',
			'application/vnd.groove-account' => 'gac',
			'application/vnd.groove-help' => 'ghf',
			'application/vnd.groove-identity-message' => 'gim',
			'application/vnd.groove-injector' => 'grv',
			'application/vnd.groove-tool-message' => 'gtm',
			'application/vnd.groove-tool-template' => 'tpl',
			'application/vnd.groove-vcard' => 'vcg',
			'application/vnd.hal+xml' => 'hal',
			'application/vnd.handheld-entertainment+xml' => 'zmm',
			'application/vnd.hbci' => 'hbci',
			'application/vnd.hhe.lesson-player' => 'les',
			'application/vnd.hp-hpgl' => 'hpgl',
			'application/vnd.hp-hpid' => 'hpid',
			'application/vnd.hp-hps' => 'hps',
			'application/vnd.hp-jlyt' => 'jlt',
			'application/vnd.hp-pcl' => 'pcl',
			'application/vnd.hp-pclxl' => 'pclxl',
			'application/vnd.hydrostatix.sof-data' => 'sfd-hdstx',
			'application/vnd.ibm.minipay' => 'mpy',
			'application/vnd.ibm.modcap' => 'afp',
			'application/vnd.ibm.rights-management' => 'irm',
			'application/vnd.ibm.secure-container' => 'sc',
			'application/vnd.iccprofile' => 'icc',
			'application/vnd.igloader' => 'igl',
			'application/vnd.immervision-ivp' => 'ivp',
			'application/vnd.immervision-ivu' => 'ivu',
			'application/vnd.insors.igm' => 'igm',
			'application/vnd.intercon.formnet' => 'xpw',
			'application/vnd.intergeo' => 'i2g',
			'application/vnd.intu.qbo' => 'qbo',
			'application/vnd.intu.qfx' => 'qfx',
			'application/vnd.ipunplugged.rcprofile' => 'rcprofile',
			'application/vnd.irepository.package+xml' => 'irp',
			'application/vnd.is-xpr' => 'xpr',
			'application/vnd.isac.fcs' => 'fcs',
			'application/vnd.jam' => 'jam',
			'application/vnd.jcp.javame.midlet-rms' => 'rms',
			'application/vnd.jisp' => 'jisp',
			'application/vnd.joost.joda-archive' => 'joda',
			'application/vnd.kahootz' => 'ktz',
			'application/vnd.kde.karbon' => 'karbon',
			'application/vnd.kde.kchart' => 'chrt',
			'application/vnd.kde.kformula' => 'kfo',
			'application/vnd.kde.kivio' => 'flw',
			'application/vnd.kde.kontour' => 'kon',
			'application/vnd.kde.kpresenter' => 'kpr',
			'application/vnd.kde.kspread' => 'ksp',
			'application/vnd.kde.kword' => 'kwd',
			'application/vnd.kenameaapp' => 'htke',
			'application/vnd.kidspiration' => 'kia',
			'application/vnd.kinar' => 'kne',
			'application/vnd.koan' => 'skp',
			'application/vnd.kodak-descriptor' => 'sse',
			'application/vnd.las.las+xml' => 'lasxml',
			'application/vnd.llamagraphics.life-balance.desktop' => 'lbd',
			'application/vnd.llamagraphics.life-balance.exchange+xml' => 'lbe',
			'application/vnd.lotus-1-2-3' => '123',
			'application/vnd.lotus-approach' => 'apr',
			'application/vnd.lotus-freelance' => 'pre',
			'application/vnd.lotus-notes' => 'nsf',
			'application/vnd.lotus-organizer' => 'org',
			'application/vnd.lotus-screencam' => 'scm',
			'application/vnd.lotus-wordpro' => 'lwp',
			'application/vnd.macports.portpkg' => 'portpkg',
			'application/vnd.mcd' => 'mcd',
			'application/vnd.medcalcdata' => 'mc1',
			'application/vnd.mediastation.cdkey' => 'cdkey',
			'application/vnd.mfer' => 'mwf',
			'application/vnd.mfmp' => 'mfm',
			'application/vnd.micrografx.flo' => 'flo',
			'application/vnd.micrografx.igx' => 'igx',
			'application/vnd.mif' => 'mif',
			'application/vnd.mobius.daf' => 'daf',
			'application/vnd.mobius.dis' => 'dis',
			'application/vnd.mobius.mbk' => 'mbk',
			'application/vnd.mobius.mqy' => 'mqy',
			'application/vnd.mobius.msl' => 'msl',
			'application/vnd.mobius.plc' => 'plc',
			'application/vnd.mobius.txf' => 'txf',
			'application/vnd.mophun.application' => 'mpn',
			'application/vnd.mophun.certificate' => 'mpc',
			'application/vnd.mozilla.xul+xml' => 'xul',
			'application/vnd.ms-artgalry' => 'cil',
			'application/vnd.ms-cab-compressed' => 'cab',
			'application/vnd.ms-excel' => 'xls',
			'application/vnd.ms-excel.addin.macroenabled.12' => 'xlam',
			'application/vnd.ms-excel.sheet.binary.macroenabled.12' => 'xlsb',
			'application/vnd.ms-excel.sheet.macroenabled.12' => 'xlsm',
			'application/vnd.ms-excel.template.macroenabled.12' => 'xltm',
			'application/vnd.ms-fontobject' => 'eot',
			'application/vnd.ms-htmlhelp' => 'chm',
			'application/vnd.ms-ims' => 'ims',
			'application/vnd.ms-lrm' => 'lrm',
			'application/vnd.ms-officetheme' => 'thmx',
			'application/vnd.ms-pki.seccat' => 'cat',
			'application/vnd.ms-pki.stl' => 'stl',
			'application/vnd.ms-powerpoint' => 'ppt',
			'application/vnd.ms-powerpoint.addin.macroenabled.12' => 'ppam',
			'application/vnd.ms-powerpoint.presentation.macroenabled.12' => 'pptm',
			'application/vnd.ms-powerpoint.slide.macroenabled.12' => 'sldm',
			'application/vnd.ms-powerpoint.slideshow.macroenabled.12' => 'ppsm',
			'application/vnd.ms-powerpoint.template.macroenabled.12' => 'potm',
			'application/vnd.ms-project' => 'mpp',
			'application/vnd.ms-word.document.macroenabled.12' => 'docm',
			'application/vnd.ms-word.template.macroenabled.12' => 'dotm',
			'application/vnd.ms-works' => 'wps',
			'application/vnd.ms-wpl' => 'wpl',
			'application/vnd.ms-xpsdocument' => 'xps',
			'application/vnd.mseq' => 'mseq',
			'application/vnd.musician' => 'mus',
			'application/vnd.muvee.style' => 'msty',
			'application/vnd.mynfc' => 'taglet',
			'application/vnd.neurolanguage.nlu' => 'nlu',
			'application/vnd.nitf' => 'ntf',
			'application/vnd.noblenet-directory' => 'nnd',
			'application/vnd.noblenet-sealer' => 'nns',
			'application/vnd.noblenet-web' => 'nnw',
			'application/vnd.nokia.n-gage.data' => 'ngdat',
			'application/vnd.nokia.n-gage.symbian.install' => 'n-gage',
			'application/vnd.nokia.radio-preset' => 'rpst',
			'application/vnd.nokia.radio-presets' => 'rpss',
			'application/vnd.novadigm.edm' => 'edm',
			'application/vnd.novadigm.edx' => 'edx',
			'application/vnd.novadigm.ext' => 'ext',
			'application/vnd.oasis.opendocument.chart' => 'odc',
			'application/vnd.oasis.opendocument.chart-template' => 'otc',
			'application/vnd.oasis.opendocument.database' => 'odb',
			'application/vnd.oasis.opendocument.formula' => 'odf',
			'application/vnd.oasis.opendocument.formula-template' => 'odft',
			'application/vnd.oasis.opendocument.graphics' => 'odg',
			'application/vnd.oasis.opendocument.graphics-template' => 'otg',
			'application/vnd.oasis.opendocument.image' => 'odi',
			'application/vnd.oasis.opendocument.image-template' => 'oti',
			'application/vnd.oasis.opendocument.presentation' => 'odp',
			'application/vnd.oasis.opendocument.presentation-template' => 'otp',
			'application/vnd.oasis.opendocument.spreadsheet' => 'ods',
			'application/vnd.oasis.opendocument.spreadsheet-template' => 'ots',
			'application/vnd.oasis.opendocument.text' => 'odt',
			'application/vnd.oasis.opendocument.text-master' => 'odm',
			'application/vnd.oasis.opendocument.text-template' => 'ott',
			'application/vnd.oasis.opendocument.text-web' => 'oth',
			'application/vnd.olpc-sugar' => 'xo',
			'application/vnd.oma.dd2+xml' => 'dd2',
			'application/vnd.openofficeorg.extension' => 'oxt',
			'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'pptx',
			'application/vnd.openxmlformats-officedocument.presentationml.slide' => 'sldx',
			'application/vnd.openxmlformats-officedocument.presentationml.slideshow' => 'ppsx',
			'application/vnd.openxmlformats-officedocument.presentationml.template' => 'potx',
			'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'xlsx',
			'application/vnd.openxmlformats-officedocument.spreadsheetml.template' => 'xltx',
			'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx',
			'application/vnd.openxmlformats-officedocument.wordprocessingml.template' => 'dotx',
			'application/vnd.osgeo.mapguide.package' => 'mgp',
			'application/vnd.osgi.dp' => 'dp',
			'application/vnd.osgi.subsystem' => 'esa',
			'application/vnd.palm' => 'pdb',
			'application/vnd.pawaafile' => 'paw',
			'application/vnd.pg.format' => 'str',
			'application/vnd.pg.osasli' => 'ei6',
			'application/vnd.picsel' => 'efif',
			'application/vnd.pmi.widget' => 'wg',
			'application/vnd.pocketlearn' => 'plf',
			'application/vnd.powerbuilder6' => 'pbd',
			'application/vnd.previewsystems.box' => 'box',
			'application/vnd.proteus.magazine' => 'mgz',
			'application/vnd.publishare-delta-tree' => 'qps',
			'application/vnd.pvi.ptid1' => 'ptid',
			'application/vnd.quark.quarkxpress' => 'qxd',
			'application/vnd.realvnc.bed' => 'bed',
			'application/vnd.recordare.musicxml' => 'mxl',
			'application/vnd.recordare.musicxml+xml' => 'musicxml',
			'application/vnd.rig.cryptonote' => 'cryptonote',
			'application/vnd.rim.cod' => 'cod',
			'application/vnd.rn-realmedia' => 'rm',
			'application/vnd.rn-realmedia-vbr' => 'rmvb',
			'application/vnd.route66.link66+xml' => 'link66',
			'application/vnd.sailingtracker.track' => 'st',
			'application/vnd.seemail' => 'see',
			'application/vnd.sema' => 'sema',
			'application/vnd.semd' => 'semd',
			'application/vnd.semf' => 'semf',
			'application/vnd.shana.informed.formdata' => 'ifm',
			'application/vnd.shana.informed.formtemplate' => 'itp',
			'application/vnd.shana.informed.interchange' => 'iif',
			'application/vnd.shana.informed.package' => 'ipk',
			'application/vnd.simtech-mindmapper' => 'twd',
			'application/vnd.smaf' => 'mmf',
			'application/vnd.smart.teacher' => 'teacher',
			'application/vnd.solent.sdkm+xml' => 'sdkm',
			'application/vnd.spotfire.dxp' => 'dxp',
			'application/vnd.spotfire.sfs' => 'sfs',
			'application/vnd.stardivision.calc' => 'sdc',
			'application/vnd.stardivision.draw' => 'sda',
			'application/vnd.stardivision.impress' => 'sdd',
			'application/vnd.stardivision.math' => 'smf',
			'application/vnd.stardivision.writer' => 'sdw',
			'application/vnd.stardivision.writer-global' => 'sgl',
			'application/vnd.stepmania.package' => 'smzip',
			'application/vnd.stepmania.stepchart' => 'sm',
			'application/vnd.sun.xml.calc' => 'sxc',
			'application/vnd.sun.xml.calc.template' => 'stc',
			'application/vnd.sun.xml.draw' => 'sxd',
			'application/vnd.sun.xml.draw.template' => 'std',
			'application/vnd.sun.xml.impress' => 'sxi',
			'application/vnd.sun.xml.impress.template' => 'sti',
			'application/vnd.sun.xml.math' => 'sxm',
			'application/vnd.sun.xml.writer' => 'sxw',
			'application/vnd.sun.xml.writer.global' => 'sxg',
			'application/vnd.sun.xml.writer.template' => 'stw',
			'application/vnd.sus-calendar' => 'sus',
			'application/vnd.svd' => 'svd',
			'application/vnd.symbian.install' => 'sis',
			'application/vnd.syncml+xml' => 'xsm',
			'application/vnd.syncml.dm+wbxml' => 'bdm',
			'application/vnd.syncml.dm+xml' => 'xdm',
			'application/vnd.tao.intent-module-archive' => 'tao',
			'application/vnd.tcpdump.pcap' => 'pcap',
			'application/vnd.tmobile-livetv' => 'tmo',
			'application/vnd.trid.tpt' => 'tpt',
			'application/vnd.triscape.mxs' => 'mxs',
			'application/vnd.trueapp' => 'tra',
			'application/vnd.ufdl' => 'ufd',
			'application/vnd.uiq.theme' => 'utz',
			'application/vnd.umajin' => 'umj',
			'application/vnd.unity' => 'unityweb',
			'application/vnd.uoml+xml' => 'uoml',
			'application/vnd.vcx' => 'vcx',
			'application/vnd.visio' => 'vsd',
			'application/vnd.visionary' => 'vis',
			'application/vnd.vsf' => 'vsf',
			'application/vnd.wap.wbxml' => 'wbxml',
			'application/vnd.wap.wmlc' => 'wmlc',
			'application/vnd.wap.wmlscriptc' => 'wmlsc',
			'application/vnd.webturbo' => 'wtb',
			'application/vnd.wolfram.player' => 'nbp',
			'application/vnd.wordperfect' => 'wpd',
			'application/vnd.wqd' => 'wqd',
			'application/vnd.wt.stf' => 'stf',
			'application/vnd.xara' => 'xar',
			'application/vnd.xfdl' => 'xfdl',
			'application/vnd.yamaha.hv-dic' => 'hvd',
			'application/vnd.yamaha.hv-script' => 'hvs',
			'application/vnd.yamaha.hv-voice' => 'hvp',
			'application/vnd.yamaha.openscoreformat' => 'osf',
			'application/vnd.yamaha.openscoreformat.osfpvg+xml' => 'osfpvg',
			'application/vnd.yamaha.smaf-audio' => 'saf',
			'application/vnd.yamaha.smaf-phrase' => 'spf',
			'application/vnd.yellowriver-custom-menu' => 'cmp',
			'application/vnd.zul' => 'zir',
			'application/vnd.zzazz.deck+xml' => 'zaz',
			'application/voicexml+xml' => 'vxml',
			'application/widget' => 'wgt',
			'application/winhlp' => 'hlp',
			'application/wsdl+xml' => 'wsdl',
			'application/wspolicy+xml' => 'wspolicy',
			'application/x-7z-compressed' => '7z',
			'application/x-abiword' => 'abw',
			'application/x-ace-compressed' => 'ace',
			'application/x-apple-diskimage' => 'dmg',
			'application/x-authorware-bin' => 'aab',
			'application/x-authorware-map' => 'aam',
			'application/x-authorware-seg' => 'aas',
			'application/x-bcpio' => 'bcpio',
			'application/x-bittorrent' => 'torrent',
			'application/x-blorb' => 'blb',
			'application/x-bzip' => 'bz',
			'application/x-bzip2' => 'bz2',
			'application/x-cbr' => 'cbr',
			'application/x-cdlink' => 'vcd',
			'application/x-cfs-compressed' => 'cfs',
			'application/x-chat' => 'chat',
			'application/x-chess-pgn' => 'pgn',
			'application/x-conference' => 'nsc',
			'application/x-cpio' => 'cpio',
			'application/x-csh' => 'csh',
			'application/x-debian-package' => 'deb',
			'application/x-dgc-compressed' => 'dgc',
			'application/x-director' => 'dir',
			'application/x-doom' => 'wad',
			'application/x-dtbncx+xml' => 'ncx',
			'application/x-dtbook+xml' => 'dtb',
			'application/x-dtbresource+xml' => 'res',
			'application/x-dvi' => 'dvi',
			'application/x-envoy' => 'evy',
			'application/x-eva' => 'eva',
			'application/x-font-bdf' => 'bdf',
			'application/x-font-ghostscript' => 'gsf',
			'application/x-font-linux-psf' => 'psf',
			'application/x-font-otf' => 'otf',
			'application/x-font-pcf' => 'pcf',
			'application/x-font-snf' => 'snf',
			'application/x-font-ttf' => 'ttf',
			'application/x-font-type1' => 'pfa',
			'application/x-font-woff' => 'woff',
			'application/x-freearc' => 'arc',
			'application/x-futuresplash' => 'spl',
			'application/x-gca-compressed' => 'gca',
			'application/x-glulx' => 'ulx',
			'application/x-gnumeric' => 'gnumeric',
			'application/x-gramps-xml' => 'gramps',
			'application/x-gtar' => 'gtar',
			'application/x-hdf' => 'hdf',
			'application/x-install-instructions' => 'install',
			'application/x-iso9660-image' => 'iso',
			'application/x-java-jnlp-file' => 'jnlp',
			'application/x-latex' => 'latex',
			'application/x-lzh-compressed' => 'lzh',
			'application/x-mie' => 'mie',
			'application/x-mobipocket-ebook' => 'prc',
			'application/x-ms-application' => 'application',
			'application/x-ms-shortcut' => 'lnk',
			'application/x-ms-wmd' => 'wmd',
			'application/x-ms-wmz' => 'wmz',
			'application/x-ms-xbap' => 'xbap',
			'application/x-msaccess' => 'mdb',
			'application/x-msbinder' => 'obd',
			'application/x-mscardfile' => 'crd',
			'application/x-msclip' => 'clp',
			'application/x-msdownload' => 'exe',
			'application/x-msmediaview' => 'mvb',
			'application/x-msmetafile' => 'wmf',
			'application/x-msmoney' => 'mny',
			'application/x-mspublisher' => 'pub',
			'application/x-msschedule' => 'scd',
			'application/x-msterminal' => 'trm',
			'application/x-mswrite' => 'wri',
			'application/x-netcdf' => 'nc',
			'application/x-nzb' => 'nzb',
			'application/x-pkcs12' => 'p12',
			'application/x-pkcs7-certificates' => 'p7b',
			'application/x-pkcs7-certreqresp' => 'p7r',
			'application/x-rar-compressed' => 'rar',
			'application/x-rar' => 'rar',
			'application/x-research-info-systems' => 'ris',
			'application/x-sh' => 'sh',
			'application/x-shar' => 'shar',
			'application/x-shockwave-flash' => 'swf',
			'application/x-silverlight-app' => 'xap',
			'application/x-sql' => 'sql',
			'application/x-stuffit' => 'sit',
			'application/x-stuffitx' => 'sitx',
			'application/x-subrip' => 'srt',
			'application/x-sv4cpio' => 'sv4cpio',
			'application/x-sv4crc' => 'sv4crc',
			'application/x-t3vm-image' => 't3',
			'application/x-tads' => 'gam',
			'application/x-tar' => 'tar',
			'application/x-tcl' => 'tcl',
			'application/x-tex' => 'tex',
			'application/x-tex-tfm' => 'tfm',
			'application/x-texinfo' => 'texinfo',
			'application/x-tgif' => 'obj',
			'application/x-ustar' => 'ustar',
			'application/x-wais-source' => 'src',
			'application/x-x509-ca-cert' => 'der',
			'application/x-xfig' => 'fig',
			'application/x-xliff+xml' => 'xlf',
			'application/x-xpinstall' => 'xpi',
			'application/x-xz' => 'xz',
			'application/x-zmachine' => 'z1',
			'application/xaml+xml' => 'xaml',
			'application/xcap-diff+xml' => 'xdf',
			'application/xenc+xml' => 'xenc',
			'application/xhtml+xml' => 'xhtml',
			'application/xml' => 'xml',
			'application/xml-dtd' => 'dtd',
			'application/xop+xml' => 'xop',
			'application/xproc+xml' => 'xpl',
			'application/xslt+xml' => 'xslt',
			'application/xspf+xml' => 'xspf',
			'application/xv+xml' => 'mxml',
			'application/yang' => 'yang',
			'application/yin+xml' => 'yin',
			'application/zip' => 'zip',
			'audio/adpcm' => 'adp',
			'audio/basic' => 'au',
			'audio/midi' => 'mid',
			'audio/mp4' => 'mp4a',
			'audio/mpeg' => 'mpga',
			'audio/ogg' => 'oga',
			'audio/s3m' => 's3m',
			'audio/silk' => 'sil',
			'audio/vnd.dece.audio' => 'uva',
			'audio/vnd.digital-winds' => 'eol',
			'audio/vnd.dra' => 'dra',
			'audio/vnd.dts' => 'dts',
			'audio/vnd.dts.hd' => 'dtshd',
			'audio/vnd.lucent.voice' => 'lvp',
			'audio/vnd.ms-playready.media.pya' => 'pya',
			'audio/vnd.nuera.ecelp4800' => 'ecelp4800',
			'audio/vnd.nuera.ecelp7470' => 'ecelp7470',
			'audio/vnd.nuera.ecelp9600' => 'ecelp9600',
			'audio/vnd.rip' => 'rip',
			'audio/webm' => 'weba',
			'audio/x-aac' => 'aac',
			'audio/x-aiff' => 'aif',
			'audio/x-caf' => 'caf',
			'audio/x-flac' => 'flac',
			'audio/x-matroska' => 'mka',
			'audio/x-mpegurl' => 'm3u',
			'audio/x-ms-wax' => 'wax',
			'audio/x-ms-wma' => 'wma',
			'audio/x-pn-realaudio' => 'ram',
			'audio/x-pn-realaudio-plugin' => 'rmp',
			'audio/x-wav' => 'wav',
			'audio/xm' => 'xm',
			'chemical/x-cdx' => 'cdx',
			'chemical/x-cif' => 'cif',
			'chemical/x-cmdf' => 'cmdf',
			'chemical/x-cml' => 'cml',
			'chemical/x-csml' => 'csml',
			'chemical/x-xyz' => 'xyz',
			'image/bmp' => 'bmp',
			'image/x-ms-bmp' => 'bmp',
			'image/cgm' => 'cgm',
			'image/g3fax' => 'g3',
			'image/gif' => 'gif',
			'image/ief' => 'ief',
			'image/jpeg' => 'jpeg',
			'image/ktx' => 'ktx',
			'image/png' => 'png',
			'image/prs.btif' => 'btif',
			'image/sgi' => 'sgi',
			'image/svg+xml' => 'svg',
			'image/tiff' => 'tiff',
			'image/vnd.adobe.photoshop' => 'psd',
			'image/vnd.dece.graphic' => 'uvi',
			'image/vnd.dvb.subtitle' => 'sub',
			'image/vnd.djvu' => 'djvu',
			'image/vnd.dwg' => 'dwg',
			'image/vnd.dxf' => 'dxf',
			'image/vnd.fastbidsheet' => 'fbs',
			'image/vnd.fpx' => 'fpx',
			'image/vnd.fst' => 'fst',
			'image/vnd.fujixerox.edmics-mmr' => 'mmr',
			'image/vnd.fujixerox.edmics-rlc' => 'rlc',
			'image/vnd.ms-modi' => 'mdi',
			'image/vnd.ms-photo' => 'wdp',
			'image/vnd.net-fpx' => 'npx',
			'image/vnd.wap.wbmp' => 'wbmp',
			'image/vnd.xiff' => 'xif',
			'image/webp' => 'webp',
			'image/x-3ds' => '3ds',
			'image/x-cmu-raster' => 'ras',
			'image/x-cmx' => 'cmx',
			'image/x-freehand' => 'fh',
			'image/x-icon' => 'ico',
			'image/x-mrsid-image' => 'sid',
			'image/x-pcx' => 'pcx',
			'image/x-pict' => 'pic',
			'image/x-portable-anymap' => 'pnm',
			'image/x-portable-bitmap' => 'pbm',
			'image/x-portable-graymap' => 'pgm',
			'image/x-portable-pixmap' => 'ppm',
			'image/x-rgb' => 'rgb',
			'image/x-tga' => 'tga',
			'image/x-xbitmap' => 'xbm',
			'image/x-xpixmap' => 'xpm',
			'image/x-xwindowdump' => 'xwd',
			'message/rfc822' => 'eml',
			'model/iges' => 'igs',
			'model/mesh' => 'msh',
			'model/vnd.collada+xml' => 'dae',
			'model/vnd.dwf' => 'dwf',
			'model/vnd.gdl' => 'gdl',
			'model/vnd.gtw' => 'gtw',
			'model/vnd.mts' => 'mts',
			'model/vnd.vtu' => 'vtu',
			'model/vrml' => 'wrl',
			'model/x3d+binary' => 'x3db',
			'model/x3d+vrml' => 'x3dv',
			'model/x3d+xml' => 'x3d',
			'text/cache-manifest' => 'appcache',
			'text/calendar' => 'ics',
			'text/css' => 'css',
			'text/csv' => 'csv',
			'text/html' => 'html',
			'text/n3' => 'n3',
			'text/plain' => 'txt',
			'text/prs.lines.tag' => 'dsc',
			'text/richtext' => 'rtx',
			'text/rtf' => 'rtf',
			'text/sgml' => 'sgml',
			'text/tab-separated-values' => 'tsv',
			'text/troff' => 't',
			'text/turtle' => 'ttl',
			'text/uri-list' => 'uri',
			'text/vcard' => 'vcard',
			'text/vnd.curl' => 'curl',
			'text/vnd.curl.dcurl' => 'dcurl',
			'text/vnd.curl.scurl' => 'scurl',
			'text/vnd.curl.mcurl' => 'mcurl',
			'text/vnd.dvb.subtitle' => 'sub',
			'text/vnd.fly' => 'fly',
			'text/vnd.fmi.flexstor' => 'flx',
			'text/vnd.graphviz' => 'gv',
			'text/vnd.in3d.3dml' => '3dml',
			'text/vnd.in3d.spot' => 'spot',
			'text/vnd.sun.j2me.app-descriptor' => 'jad',
			'text/vnd.wap.wml' => 'wml',
			'text/vnd.wap.wmlscript' => 'wmls',
			'text/x-asm' => 's',
			'text/x-c' => 'c',
			'text/x-fortran' => 'f',
			'text/x-pascal' => 'p',
			'text/x-java-source' => 'java',
			'text/x-opml' => 'opml',
			'text/x-nfo' => 'nfo',
			'text/x-setext' => 'etx',
			'text/x-sfv' => 'sfv',
			'text/x-uuencode' => 'uu',
			'text/x-vcalendar' => 'vcs',
			'text/x-vcard' => 'vcf',
			'video/3gpp' => '3gp',
			'video/3gpp2' => '3g2',
			'video/h261' => 'h261',
			'video/h263' => 'h263',
			'video/h264' => 'h264',
			'video/jpeg' => 'jpgv',
			'video/jpm' => 'jpm',
			'video/mj2' => 'mj2',
			'video/mp4' => 'mp4',
			'video/mpeg' => 'mpeg',
			'video/ogg' => 'ogv',
			'video/quicktime' => 'qt',
			'video/vnd.dece.hd' => 'uvh',
			'video/vnd.dece.mobile' => 'uvm',
			'video/vnd.dece.pd' => 'uvp',
			'video/vnd.dece.sd' => 'uvs',
			'video/vnd.dece.video' => 'uvv',
			'video/vnd.dvb.file' => 'dvb',
			'video/vnd.fvt' => 'fvt',
			'video/vnd.mpegurl' => 'mxu',
			'video/vnd.ms-playready.media.pyv' => 'pyv',
			'video/vnd.uvvu.mp4' => 'uvu',
			'video/vnd.vivo' => 'viv',
			'video/webm' => 'webm',
			'video/x-f4v' => 'f4v',
			'video/x-fli' => 'fli',
			'video/x-flv' => 'flv',
			'video/x-m4v' => 'm4v',
			'video/x-matroska' => 'mkv',
			'video/x-mng' => 'mng',
			'video/x-ms-asf' => 'asf',
			'video/x-ms-vob' => 'vob',
			'video/x-ms-wm' => 'wm',
			'video/x-ms-wmv' => 'wmv',
			'video/x-ms-wmx' => 'wmx',
			'video/x-ms-wvx' => 'wvx',
			'video/x-msvideo' => 'avi',
			'video/x-sgi-movie' => 'movie',
			'video/x-smv' => 'smv',
			'x-conference/x-cooltalk' => 'ice',
	];
	
	/**
	 * 是否允许重命名
	 * @var boolean
	 * @author simon
	 */
	protected $rename = true;//ok
	
	/**
	 * 自动创建hash目录的层级数，当为0的时候不创建
	 * @var numeric
	 * @author simon
	 */
	protected $hashDirLayer = 2;//ok
	
	
	public function __construct($path = null)
	{
		$this->setPath($path);
	}
	
	/**
	 * 全局配置，可使用setXX方法覆盖config方法
	 * @param array $config
	 * @author simon
	 */
	public function config(array $config)
	{
		$allowPrototype = ['filesize','extensions','checkExtension','checkMime','rename','hashDirLayer'];
		
		foreach ($config as $key=>$value)
		{
			in_array($key, $allowPrototype,true) && $this->$key = $value;
		}
		
		return $this;
	}
	
	
	/**
	 * 设置hash目录的层级数
	 * @param numeric $layer
	 * @author simon
	 */
	public function setHashDirLayer($layer)
	{
		$this->hashDirLayer = $layer;
		return $this;
	}
	
	/**
	 * 获取hash目录的层级数
	 * @return \Simon\File\Uploads\numeric
	 * @author simon
	 */
	public function getHashDirLayer()
	{
		return $this->hashDirLayer;
	}
	
	/**
	 * 设置是否重命名文件
	 * @param boolean $isRename
	 * @return \Simon\File\Uploads\FileUpload
	 * @author simon
	 */
	public function setRename($isRename)
	{
		$this->rename = $isRename;
		return $this;
	}
	
	/**
	 * 
	 * @author simon
	 */
	public function getRename()
	{
		return $this->rename;
	}
	
	/**
	 * 是否验证扩展名
	 * @param boolean $isCheckExtension
	 * @return \Simon\File\Uploads\FileUpload
	 * @author simon
	 */
	public function setCheckExtension($isCheckExtension)
	{
		$this->checkExtension = $isCheckExtension;
		return $this;
	}
	
	/**
	 * 
	 * 
	 * @author simon
	 */
	public function getCheckExtension()
	{
		return $this->checkExtension;
	}
	
	/**
	 * 允许的文件扩展名
	 * @param array $extensions
	 * @return \Simon\File\Uploads\FileUpload
	 * @author simon
	 */
	public function setExtensions(array $extensions)
	{
		$this->extensions = $extensions;
		return $this;
	}
	
	/**
	 * 
	 * 
	 * @author simon
	 */
	public function getExtensions()
	{
		return $this->extensions;
	}
	
	/**
	 * 是否验证mime类型
	 * @param boolean $isCheckMime
	 * @return \Simon\File\Uploads\FileUpload
	 * @author simon
	 */
	public function setCheckMime($isCheckMime)
	{
		$this->checkMime = $isCheckMime;
		return $this;
	}
	
	/**
	 * 
	 * 
	 * @author simon
	 */
	public function getCheckMime()
	{
		return $this->checkMime;
	}
	
	/**
	 * 文件Mime类型
	 * @param array $mimes
	 * @author simon
	 * @return \Simon\File\Uploads\FileUpload
	 */
	public function setMimes(array $mimes)
	{
		$this->mimes = array_merge($this->mimes,$mimes);
		return $this;
	}
	
	/**
	 * 
	 * 
	 * @author simon
	 */
	public function getMimes()
	{
		return $this->mimes;
	}
	
	
	/**
	 * 文件大小
	 * @param numeric $size
	 * @return \Simon\File\Uploads\FileUpload
	 * @author simon
	 */
	public function setFilesize($size)
	{
		$this->filesize = is_numeric($size) ? $size : $this->filesize;
		return $this;
	}
	
	/**
	 * 
	 * 
	 * @author simon
	 */
	public function getFilesize()
	{
		return $this->filesize;
	}
	
	/**
	 * 文件上传
	 * 
	 * @author simon
	 */
	public function upload()
	{
		foreach ($this->setFiles() as $values)
		{
			
			$this->setUploading($values);
			
			//保存当前文件
		    $this->setFile();
		    
			//验证上传
			$this->checkUpload();
			
			//开始上传
			$this->handleUpload();
		}
	}
	
	/**
	 * 获取上传的文件
	 * @author simon
	 */
	public function getFiles()
	{
		return $this->files;
	}
	
	/**
	 * 存储当前上传的临时信息数组
	 * @param array $upload
	 * @author simon
	 */
	protected function setUploading(array $upload)
	{
		$this->uploading = $upload;
	}
	
	/**
	 * 验证文件上传
	 * @throws UploadException
	 * @throws SizeException
	 * @throws TypeErrorException
	 * @author simon
	 */
	protected function checkUpload()
	{
		//验证是否是正常上传文件
		$this->checkUploadedFile();
	
		//验证PHP自身upload检测
		$this->checkUploadSelf();
	
		//验证文件大小
		$this->checkFileSize();
	
		//验证扩展名
		$this->checkFileExtension();
	
		//验证mime
		$this->checkFileMime();
	}
	
	/**
	 * 验证文件mime类型
	 * @throws TypeErrorException
	 * @author simon
	 */
	protected function checkFileMime()
	{
		if (!$this->checkMime)
		{
			return true;
		}
		
		$extension = $this->file->getExtension($this->uploading['name']);
		//jpg文件mime特例
		$extension === 'jpg' && $extension = 'jpeg';

		$mimeExtension = isset($this->mimes[$this->file->getFileMime()]) ? $this->mimes[$this->file->getFileMime()] : null;
		if ($mimeExtension !== strtolower($extension))
		{
			throw new TypeErrorException($this->uploading['name'],'mime');
		}
		return true;
	}
	
	/**
	 * 验证文件扩展名
	 * @throws TypeErrorException
	 * @return boolean
	 * @author simon
	 */
	protected function checkFileExtension()
	{
		if (!$this->checkExtension)
		{
			return true;
		}
		
		//验证扩展名
		$extension = $this->file->getExtension($this->uploading['name']);
		if (!in_array(strtolower($extension), $this->extensions,true))
		{
			throw new TypeErrorException($this->uploading['name'],'extension');
		}
		return true;
	}
	
	/**
	 * 验证upload自身上传错误
	 * @throws UploadException
	 * @author simon
	 */
	protected function checkUploadSelf()
	{
		if ($this->uploading['error'] !== UPLOAD_ERR_OK)
		{
			throw new UploadException($this->uploading['name'],$this->uploading['error']);
		}
		return true;
	}
	
	/**
	 * 验证文件大小
	 * @param array $upload
	 * @throws SizeException
	 * @author simon
	 */
	protected function checkFileSize()
	{
		//验证文件大小
		if ($this->filesize < $this->file->getSize())
		{
			throw new SizeException($this->uploading['name']);
		}
		return true;
	}
	
	/**
	 * 验证是否是正常上传文件
	 * @param array $upload
	 * @throws UploadException
	 * @author simon
	 */
	protected function checkUploadedFile()
	{
		if (!is_uploaded_file($this->uploading['tmp_name']))
		{
			throw new UploadException($this->uploading['name'], UploadException::IS_NOT_UPLOAD_FILE);
		}
		return true;
	}
	
	/**
	 * 移动文件
	 * @throws UploadException
	 * @author simon
	 */
	protected function moveUploadFile()
	{
	    if (!move_uploaded_file($this->uploading['tmp_name'], $this->file->getNewPath()))
	    {
	        throw new UploadException($this->uploading['name'], UploadException::MOVE_TMP_FILE_ERR);
	    }
	    return true;
	}
	

	/**
	 * 设置文件路径
	 * @param  string $path
	 * @author simon
	 */
	protected function setPath($path)
	{
		if ($path)
		{
			$this->path = $path;
		}
		
		$this->path = str_replace('\\', '/', realpath($this->path));
	}

	/**
	 * 设置当前文件
	 * @param string $name
	 */
	protected function setFile()
	{
		$this->file = new File($this->uploading['tmp_name']);
		
		//设置新的文件名
		$this->file->setNewName($this->getNewName());
		
		//设置新的路径
		$this->file->setNewPath($this->path.'/'.$this->file->getHashDir($this->uploading['name']).$this->file->getNewName());
	}
	
	/**
	 * 处理文件上传
	 * @param array $upload
	 * @author simon
	 */
	protected function handleUpload()
	{
		//自动创建目录
		$this->file->mkDir(dirname($this->file->getNewPath()));
			
		$this->moveUploadFile();
		
		$this->files[] = $this->getUploadInfo();
	}
	
	/**
	 * 获取上传信息
	 * @author simon
	 */
	protected function getUploadInfo()
	{
		
		$filepath = $this->file->getNewPath();
		
	    $file = [];
	    $file['new_name'] = $this->file->getNewName();
	    $file['hash'] = sha1($filepath);
	    $file['old_name'] = $this->uploading['name'];
	    $file['save_path'] = $this->path;
	    $file['full_path'] = $filepath;
	    $file['full_root'] = str_replace($this->path, '', $filepath);
	    $file['extension'] = $this->file->getExtension($filepath);
	    $file['mime_type'] = $this->file->getFileMime($filepath);
	    $file['filesize'] = $this->file->getSize($filepath);
	    //完成上传时间
	    $file['complete_time'] = time();
	    //完成上传的微秒时间，用于大并发
	    list($usec, $sec) = explode(" ", microtime());
	    $file['complete_microtime'] = (float)$usec + (float)$sec;
	    /* //合并上传信息
	     //$file = array_merge($upload,$file); */
	    return $file;
	}
	
	/**
	 * 处理需要上传的文件
	 * @author simon
	 */
	protected function setFiles()
	{
		$files = [];
		if (!empty($_FILES))
		{
			$temp = [];
			foreach ($_FILES as $key=>$values)
			{
				if (is_array($values['name']))
				{
					foreach ($values['name'] as $k=>$vo)
					{
						//去除未添加上传的文件
						if (empty($vo))
						{
							continue;
						}
						$temp['name'] = $vo;
						$temp['type'] = $values['type'][$k];
						$temp['tmp_name'] = $values['tmp_name'][$k];
						$temp['error'] = $values['error'][$k];
						$temp['size'] = $values['size'][$k];
						$temp['__name'] = $key;
						$files[] = $temp;
					}
				}
				else
				{
					//去除未添加上传的文件
					if (empty($values['name']))
					{
						continue;
					}
					$values['__name'] = $key;
					$files[] = $values;
				}
			}
		}
		
		return $files;
	}
	
	/**
	 * 设置文件名
	 * @param string $name
	 * @return string 
	 * @author simon
	 */
	protected function getNewName()
	{
		$name = $this->uploading['name'];
		
		if ($this->rename)
		{
			$name = sha1(uniqid('simon_')).mt_rand(1,999).'.'.$this->file->getExtension($name);
		}
		
		return $name;
	}
// 	protected function getNewName($name)
// 	{
// 		if ($this->rename)
// 		{
// 			$this->newName = sha1(uniqid('simon_')).mt_rand(1,999).'.'.$this->file->getExtension($name);
// 		}
// 		else 
// 		{
// 			$this->newName = $name;
// 		}
		
// 		return $this->newName;
// 	}
	
// 	/**
// 	 * 文件名相同时是否覆盖
// 	 * @param boolean $isCoverFile
// 	 * @author simon
// 	 */
// 	public function setCoverFile($isCoverFile)
// 	{
// 		$this->coverFile = $isCoverFile;
// 		return $this;
// 	}
	
// 	protected function coverFile($filepath)
// 	{
// 		//重命名文件
// 		if (!$this->coverFile && file_exists($filepath))
// 		{
// 			$filepath = pathinfo($filepath);
// 			$filepath = $filepath['dirname'].'/'.$nameInfo['filename'].'_2.'.$nameInfo['extension'];
// 		}
// 		return $filepath;
// 	}
	
	/**
	 * 设置HashDir
	 * @param string $name
	 * @return string
	 * @author simon
	 */
// 	protected function getHashDir($name)
// 	{
// 		$dirs = '';
		
// 		if ($this->hashDirLayer === 0)
// 		{
// 			return $dirs;
// 		}
		
// 		$name = sha1($name);
// 		$length = strlen($name);
		
// 		for($i=0;$i<$length;$i++)
// 		{
// 			if ($i+1 > $this->hashDirLayer)
// 			{
// 				break;
// 			}
// 			$dirs .= substr($name, $i,1).'/';
// 		}
		
// 		return $dirs;
// 	}
	
	/**
	 * 设置最后的文件路径
	 * @param string $dir
	 * @param string $name
	 * @return string
	 * @author simon
	 */
// 	protected function setFilePath($name)
// 	{
// 		$this->fullPath = $this->path.'/'.$this->file.$name;
// 		return $this->fullPath;
// 	}
	
// 	/**
// 	 * 创建目录
// 	 * @param string $dir
// 	 * @param number $mode
// 	 * @return boolean|bool
// 	 */
// 	protected function mkDir($dir, $mode = 0755)
// 	{
// 		if (is_dir($dir) || @mkdir($dir, $mode)) return true;
// 		if (!@$this->mkDir(dirname($dir), $mode)) return false;
// 		return mkdir($dir, $mode);
// 	}
	
}