<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The tracking information.
 *
 * generated from: response-tracking_info.json
 */
class ResponseTrackingInfo implements JsonSerializable
{
    use BaseModel;

    /** <a href="https://www.ups.com/us/en/global.page">United Parcel Service of America, Inc.</a>. */
    const CARRIER_NAME_UPS = 'UPS';

    /** <a href="https://www.usps.com/">United States Postal Service (USPS)</a>. */
    const CARRIER_NAME_USPS = 'USPS';

    /** Federal Express. */
    const CARRIER_NAME_FEDEX = 'FEDEX';

    /** Airborne Express. */
    const CARRIER_NAME_AIRBORNE_EXPRESS = 'AIRBORNE_EXPRESS';

    /** DHL Express. */
    const CARRIER_NAME_DHL = 'DHL';

    /** Airsure. */
    const CARRIER_NAME_AIRSURE = 'AIRSURE';

    /** Royal Mail. */
    const CARRIER_NAME_ROYAL_MAIL = 'ROYAL_MAIL';

    /** Parcel Force. */
    const CARRIER_NAME_PARCELFORCE = 'PARCELFORCE';

    /** Swift Air. */
    const CARRIER_NAME_SWIFTAIR = 'SWIFTAIR';

    /** Other. */
    const CARRIER_NAME_OTHER = 'OTHER';

    /** Parcelforce UK. */
    const CARRIER_NAME_UK_PARCELFORCE = 'UK_PARCELFORCE';

    /** Royal Mail Special Delivery UK. */
    const CARRIER_NAME_UK_ROYALMAIL_SPECIAL = 'UK_ROYALMAIL_SPECIAL';

    /** Royal Mail Recorded UK. */
    const CARRIER_NAME_UK_ROYALMAIL_RECORDED = 'UK_ROYALMAIL_RECORDED';

    /** Royal Mail International Signed. */
    const CARRIER_NAME_UK_ROYALMAIL_INT_SIGNED = 'UK_ROYALMAIL_INT_SIGNED';

    /** Royal Mail AirSure UK. */
    const CARRIER_NAME_UK_ROYALMAIL_AIRSURE = 'UK_ROYALMAIL_AIRSURE';

    /** United Parcel Service UK. */
    const CARRIER_NAME_UK_UPS = 'UK_UPS';

    /** Federal Express UK. */
    const CARRIER_NAME_UK_FEDEX = 'UK_FEDEX';

    /** Airborne Express UK. */
    const CARRIER_NAME_UK_AIRBORNE_EXPRESS = 'UK_AIRBORNE_EXPRESS';

    /** DHL UK. */
    const CARRIER_NAME_UK_DHL = 'UK_DHL';

    /** Other - UK. */
    const CARRIER_NAME_UK_OTHER = 'UK_OTHER';

    /** Cannot provide tracking UK. */
    const CARRIER_NAME_UK_CANNOT_PROV_TRACK = 'UK_CANNOT_PROV_TRACK';

    /** Cannot provide tracking - UK. */
    const CARRIER_NAME_UK_CANNOT_PROVIDE_TRACKING = 'UK_CANNOT_PROVIDE_TRACKING';

    /** <a href="https://www.canadapost.ca/cpc/en/home.page">Canada Post</a>. */
    const CARRIER_NAME_CA_CANADA_POST = 'CA_CANADA_POST';

    /** Purolator Canada. */
    const CARRIER_NAME_CA_PUROLATOR = 'CA_PUROLATOR';

    /** Canpar Courier Canada. */
    const CARRIER_NAME_CA_CANPAR = 'CA_CANPAR';

    /** Loomis Express Canada. */
    const CARRIER_NAME_CA_LOOMIS = 'CA_LOOMIS';

    /** TNT Express Canada. */
    const CARRIER_NAME_CA_TNT = 'CA_TNT';

    /** TNT Global. */
    const CARRIER_NAME_TNT = 'TNT';

    /** Other - Canada. */
    const CARRIER_NAME_CA_OTHER = 'CA_OTHER';

    /** Cannot provide tracking Canada. */
    const CARRIER_NAME_CA_CANNOT_PROV_TRACK = 'CA_CANNOT_PROV_TRACK';

    /** DHL Parcel Europe. */
    const CARRIER_NAME_DE_DP_DHL_WITHIN_EUROPE = 'DE_DP_DHL_WITHIN_EUROPE';

    /** DHL T and T Express. */
    const CARRIER_NAME_DE_DP_DHL_T_AND_T_EXPRESS = 'DE_DP_DHL_T_AND_T_EXPRESS';

    /** DHL DP International shipments. */
    const CARRIER_NAME_DE_DHL_DP_INTL_SHIPMENTS = 'DE_DHL_DP_INTL_SHIPMENTS';

    /** Cannot provide tracking - Canada. */
    const CARRIER_NAME_CA_CANNOT_PROVIDE_TRACKING = 'CA_CANNOT_PROVIDE_TRACKING';

    /** <a href="https://gls-group.eu/">General Logistics Systems (GLS) Germany</a>. */
    const CARRIER_NAME_DE_GLS = 'DE_GLS';

    /** DPD Tracking Germany. */
    const CARRIER_NAME__DE_DPD_DELISTACK = ' DE_DPD_DELISTACK';

    /** Hermes Germany. */
    const CARRIER_NAME_DE_HERMES = 'DE_HERMES';

    /** United Parcel Service Germany. */
    const CARRIER_NAME_DE_UPS = 'DE_UPS';

    /** Federal Express Germany. */
    const CARRIER_NAME_DE_FEDEX = 'DE_FEDEX';

    /** TNT Germany. */
    const CARRIER_NAME_DE_TNT = 'DE_TNT';

    /** Other - Germany. */
    const CARRIER_NAME_DE_OTHER = 'DE_OTHER';

    /** Chronopost France. */
    const CARRIER_NAME_FR_CHRONOPOST = 'FR_CHRONOPOST';

    /** Coliposte France. */
    const CARRIER_NAME_FR_COLIPOSTE = 'FR_COLIPOSTE';

    /** DHL France. */
    const CARRIER_NAME_FR_DHL = 'FR_DHL';

    /** United Parcel Service France. */
    const CARRIER_NAME_FR_UPS = 'FR_UPS';

    /** Federal Express France. */
    const CARRIER_NAME_FR_FEDEX = 'FR_FEDEX';

    /** TNT France. */
    const CARRIER_NAME_FR_TNT = 'FR_TNT';

    /** <a href="https://gls-group.eu/">General Logistics Systems (GLS) France</a>. */
    const CARRIER_NAME_FR_GLS = 'FR_GLS';

    /** Other - France. */
    const CARRIER_NAME_FR_OTHER = 'FR_OTHER';

    /** Poste Italia. */
    const CARRIER_NAME_IT_POSTE_ITALIA = 'IT_POSTE_ITALIA';

    /** DHL Italy. */
    const CARRIER_NAME_IT_DHL = 'IT_DHL';

    /** United Parcel Service Italy. */
    const CARRIER_NAME_IT_UPS = 'IT_UPS';

    /** Federal Express Italy. */
    const CARRIER_NAME_IT_FEDEX = 'IT_FEDEX';

    /** <a href="https://www.tnt.it/">TNT Italy</a>. */
    const CARRIER_NAME_IT_TNT = 'IT_TNT';

    /** <a href="https://gls-group.eu/">General Logistics Systems (GLS) Italy</a>. */
    const CARRIER_NAME_IT_GLS = 'IT_GLS';

    /** Other Italy. */
    const CARRIER_NAME_IT_OTHER = 'IT_OTHER';

    /** Australia Post EP Plat. */
    const CARRIER_NAME_AU_AUSTRALIA_POST_EP_PLAT = 'AU_AUSTRALIA_POST_EP_PLAT';

    /** Australia Post Eparcel. */
    const CARRIER_NAME_AU_AUSTRALIA_POST_EPARCEL = 'AU_AUSTRALIA_POST_EPARCEL';

    /** Australia Post EMS. */
    const CARRIER_NAME_AU_AUSTRALIA_POST_EMS = 'AU_AUSTRALIA_POST_EMS';

    /** DHL Australia. */
    const CARRIER_NAME_AU_DHL = 'AU_DHL';

    /** StarTrack Express Australia. */
    const CARRIER_NAME_AU_STAR_TRACK_EXPRESS = 'AU_STAR_TRACK_EXPRESS';

    /** United Parcel Service Australia. */
    const CARRIER_NAME_AU_UPS = 'AU_UPS';

    /** Federal Express Australia. */
    const CARRIER_NAME_AU_FEDEX = 'AU_FEDEX';

    /** TNT Australia. */
    const CARRIER_NAME_AU_TNT = 'AU_TNT';

    /** Toll IPEC Australia. */
    const CARRIER_NAME_AU_TOLL_IPEC = 'AU_TOLL_IPEC';

    /** Other - Australia. */
    const CARRIER_NAME_AU_OTHER = 'AU_OTHER';

    /** Suivi FedEx France. */
    const CARRIER_NAME_FR_SUIVI = 'FR_SUIVI';

    /** Poste Italiane SDA. */
    const CARRIER_NAME_IT_EBOOST_SDA = 'IT_EBOOST_SDA';

    /** Correos de Espana. */
    const CARRIER_NAME_ES_CORREOS_DE_ESPANA = 'ES_CORREOS_DE_ESPANA';

    /** DHL Spain. */
    const CARRIER_NAME_ES_DHL = 'ES_DHL';

    /** United Parcel Service Spain. */
    const CARRIER_NAME_ES_UPS = 'ES_UPS';

    /** Federal Express Spain. */
    const CARRIER_NAME_ES_FEDEX = 'ES_FEDEX';

    /** TNT Spain. */
    const CARRIER_NAME_ES_TNT = 'ES_TNT';

    /** Other - Spain. */
    const CARRIER_NAME_ES_OTHER = 'ES_OTHER';

    /** EMS Express Mail Service Austria. */
    const CARRIER_NAME_AT_AUSTRIAN_POST_EMS = 'AT_AUSTRIAN_POST_EMS';

    /** Austrian Post Prime. */
    const CARRIER_NAME_AT_AUSTRIAN_POST_PPRIME = 'AT_AUSTRIAN_POST_PPRIME';

    /** Chronopost Belgium. */
    const CARRIER_NAME_BE_CHRONOPOST = 'BE_CHRONOPOST';

    /** Taxi Post. */
    const CARRIER_NAME_BE_TAXIPOST = 'BE_TAXIPOST';

    /** Swiss Post Express. */
    const CARRIER_NAME_CH_SWISS_POST_EXPRES = 'CH_SWISS_POST_EXPRES';

    /** Swiss Post Priority. */
    const CARRIER_NAME_CH_SWISS_POST_PRIORITY = 'CH_SWISS_POST_PRIORITY';

    /** China Post. */
    const CARRIER_NAME_CN_CHINA_POST = 'CN_CHINA_POST';

    /** Hong Kong Post. */
    const CARRIER_NAME_HK_HONGKONG_POST = 'HK_HONGKONG_POST';

    /** Post SDS EMS Express Mail Service Ireland. */
    const CARRIER_NAME_IE_AN_POST_SDS_EMS = 'IE_AN_POST_SDS_EMS';

    /** Post SDS Priority Ireland. */
    const CARRIER_NAME_IE_AN_POST_SDS_PRIORITY = 'IE_AN_POST_SDS_PRIORITY';

    /** Post Registered Ireland. */
    const CARRIER_NAME_IE_AN_POST_REGISTERED = 'IE_AN_POST_REGISTERED';

    /** Swift Post Ireland. */
    const CARRIER_NAME_IE_AN_POST_SWIFTPOST = 'IE_AN_POST_SWIFTPOST';

    /** India Post. */
    const CARRIER_NAME_IN_INDIAPOST = 'IN_INDIAPOST';

    /** Japan Post. */
    const CARRIER_NAME_JP_JAPANPOST = 'JP_JAPANPOST';

    /** Korea Post. */
    const CARRIER_NAME_KR_KOREA_POST = 'KR_KOREA_POST';

    /** TPG Post Netherlands. */
    const CARRIER_NAME_NL_TPG = 'NL_TPG';

    /** SingPost Singapore. */
    const CARRIER_NAME_SG_SINGPOST = 'SG_SINGPOST';

    /** Chunghwa POST Taiwan. */
    const CARRIER_NAME_TW_CHUNGHWA_POST = 'TW_CHUNGHWA_POST';

    /** China Post EMS Express Mail Service. */
    const CARRIER_NAME_CN_CHINA_POST_EMS = 'CN_CHINA_POST_EMS';

    /** Federal Express China. */
    const CARRIER_NAME_CN_FEDEX = 'CN_FEDEX';

    /** TNT China. */
    const CARRIER_NAME_CN_TNT = 'CN_TNT';

    /** United Parcel Service China. */
    const CARRIER_NAME_CN_UPS = 'CN_UPS';

    /** Other - China. */
    const CARRIER_NAME_CN_OTHER = 'CN_OTHER';

    /** TNT Netherlands. */
    const CARRIER_NAME_NL_TNT = 'NL_TNT';

    /** DHL Netherlands. */
    const CARRIER_NAME_NL_DHL = 'NL_DHL';

    /** United Parcel Service Netherlands. */
    const CARRIER_NAME_NL_UPS = 'NL_UPS';

    /** Federal Express Netherlands. */
    const CARRIER_NAME_NL_FEDEX = 'NL_FEDEX';

    /** KIALA Netherlands. */
    const CARRIER_NAME_NL_KIALA = 'NL_KIALA';

    /** Kiala Point Belgium. */
    const CARRIER_NAME_BE_KIALA = 'BE_KIALA';

    /** Poczta Polska. */
    const CARRIER_NAME_PL_POCZTA_POLSKA = 'PL_POCZTA_POLSKA';

    /** Pocztex. */
    const CARRIER_NAME_PL_POCZTEX = 'PL_POCZTEX';

    /** General Logistics Systems Poland. */
    const CARRIER_NAME_PL_GLS = 'PL_GLS';

    /** Masterlink Poland. */
    const CARRIER_NAME_PL_MASTERLINK = 'PL_MASTERLINK';

    /** TNT Express Poland. */
    const CARRIER_NAME_PL_TNT = 'PL_TNT';

    /** DHL Portugal. */
    const CARRIER_NAME_PL_DHL = 'PL_DHL';

    /** United Parcel Service Poland. */
    const CARRIER_NAME_PL_UPS = 'PL_UPS';

    /** Federal Express Poland. */
    const CARRIER_NAME_PL_FEDEX = 'PL_FEDEX';

    /** Sagawa Kyuu Bin Japan. */
    const CARRIER_NAME_JP_SAGAWA_KYUU_BIN = 'JP_SAGAWA_KYUU_BIN';

    /** Nittsu Pelican Bin Japan. */
    const CARRIER_NAME_JP_NITTSU_PELICAN_BIN = 'JP_NITTSU_PELICAN_BIN';

    /** Kuro Neko Yamato Unyuu Japan. */
    const CARRIER_NAME_JP_KURO_NEKO_YAMATO_UNYUU = 'JP_KURO_NEKO_YAMATO_UNYUU';

    /** TNT Japan. */
    const CARRIER_NAME_JP_TNT = 'JP_TNT';

    /** DHL Japan. */
    const CARRIER_NAME_JP_DHL = 'JP_DHL';

    /** United Parcel Service Japan. */
    const CARRIER_NAME_JP_UPS = 'JP_UPS';

    /** Federal Express Japan. */
    const CARRIER_NAME_JP_FEDEX = 'JP_FEDEX';

    /** Pickup Netherlands. */
    const CARRIER_NAME_NL_PICKUP = 'NL_PICKUP';

    /** Intangible Netherlands. */
    const CARRIER_NAME_NL_INTANGIBLE = 'NL_INTANGIBLE';

    /** ABC Mail Netherlands. */
    const CARRIER_NAME_NL_ABC_MAIL = 'NL_ABC_MAIL';

    /** 4PX Express Hong Kong. */
    const CARRIER_NAME_HK_FOUR_PX_EXPRESS = 'HK_FOUR_PX_EXPRESS';

    /** Flyt Express Hong Kong. */
    const CARRIER_NAME_HK_FLYT_EXPRESS = 'HK_FLYT_EXPRESS';

    /** Ascendia US. */
    const CARRIER_NAME_US_ASCENDIA = 'US_ASCENDIA';

    /** Ensenda US. */
    const CARRIER_NAME_US_ENSENDA = 'US_ENSENDA';

    /** Globeistics US. */
    const CARRIER_NAME_US_GLOBEGISTICS = 'US_GLOBEGISTICS';

    /** Ontrac US. */
    const CARRIER_NAME_US_ONTRAC = 'US_ONTRAC';

    /** RR Donnelley. */
    const CARRIER_NAME_RRDONNELLEY = 'RRDONNELLEY';

    /** Asendia UK. */
    const CARRIER_NAME_ASENDIA_UK = 'ASENDIA_UK';

    /** <a href="https://www.collectplus.co.uk/">CollectPlus UK</a>. */
    const CARRIER_NAME_UK_COLLECTPLUS = 'UK_COLLECTPLUS';

    /** DPD UK. */
    const CARRIER_NAME_UK_DPD = 'UK_DPD';

    /** Hermesworld UK. */
    const CARRIER_NAME_UK_HERMESWORLD = 'UK_HERMESWORLD';

    /** Interlink Express UK. */
    const CARRIER_NAME_UK_INTERLINK_EXPRESS = 'UK_INTERLINK_EXPRESS';

    /** TNT UK. */
    const CARRIER_NAME_UK_TNT = 'UK_TNT';

    /** <a href="https://www.ukmail.com/">UK Mail</a>. */
    const CARRIER_NAME_UK_UK_MAIL = 'UK_UK_MAIL';

    /** <a href="https://www.yodel.co.uk/">Yodel UK</a>. */
    const CARRIER_NAME_UK_YODEL = 'UK_YODEL';

    /** <a href="https://www.aftership.com/couriers/buylogic">Buylogic</a>. */
    const CARRIER_NAME_BUYLOGIC = 'BUYLOGIC';

    /** EMS China. */
    const CARRIER_NAME_CN_EMS = 'CN_EMS';

    /** China Post. */
    const CARRIER_NAME_CHINA_POST = 'CHINA_POST';

    /** CN Express China. */
    const CARRIER_NAME_CNEXPS = 'CNEXPS';

    /** Cpacket. */
    const CARRIER_NAME_CPACKET = 'CPACKET';

    /** Cuckoo Express. */
    const CARRIER_NAME_CUCKOOEXPRESS = 'CUCKOOEXPRESS';

    /** EC China. */
    const CARRIER_NAME_CN_EC = 'CN_EC';

    /** EMPS China. */
    const CARRIER_NAME_CN_EMPS = 'CN_EMPS';

    /** Asendia Germany. */
    const CARRIER_NAME_DE_ASENDIA = 'DE_ASENDIA';

    /** Deltec UK. */
    const CARRIER_NAME_UK_DELTEC = 'UK_DELTEC';

    /** Deutsche Germany. */
    const CARRIER_NAME_DE_DEUTSCHE = 'DE_DEUTSCHE';

    /** DPD Germany. */
    const CARRIER_NAME_DE_DPD = 'DE_DPD';

    /** Raben Group. */
    const CARRIER_NAME_RABEN_GROUP = 'RABEN_GROUP';

    /** TNT Global. */
    const CARRIER_NAME_GLOBAL_TNT = 'GLOBAL_TNT';

    /** <a href="https://www.adsone.com.au/">ADSone Cumulus</a>. */
    const CARRIER_NAME_ADSONE = 'ADSONE';

    /** <a href="https://auspost.com.au/">Australian Postal Corporation</a>. */
    const CARRIER_NAME_AU_AU_POST = 'AU_AU_POST';

    /** Bonds Couriers. */
    const CARRIER_NAME_BONDSCOURIERS = 'BONDSCOURIERS';

    /** Couriers Please. */
    const CARRIER_NAME_COURIERS_PLEASE = 'COURIERS_PLEASE';

    /** DTDC Australia. */
    const CARRIER_NAME_DTDC_AU = 'DTDC_AU';

    /** Fastway Australia. */
    const CARRIER_NAME_AU_FASTWAY = 'AU_FASTWAY';

    /** Hunter Express. */
    const CARRIER_NAME_HUNTER_EXPRESS = 'HUNTER_EXPRESS';

    /** Sendle. */
    const CARRIER_NAME_SENDLE = 'SENDLE';

    /** Toll Australia. */
    const CARRIER_NAME_AUS_TOLL = 'AUS_TOLL';

    /** <a href="https://www.tollgroup.com/">Toll</a>. */
    const CARRIER_NAME_TOLL = 'TOLL';

    /** UBI Logistics. */
    const CARRIER_NAME_UBI_LOGISTICS = 'UBI_LOGISTICS';

    /** Omni Parcel. */
    const CARRIER_NAME_OMNIPARCEL = 'OMNIPARCEL';

    /** Quantium. */
    const CARRIER_NAME_QUANTIUM = 'QUANTIUM';

    /** SF Express China. */
    const CARRIER_NAME_CN_SF_EXPRESS = 'CN_SF_EXPRESS';

    /** Seko Logistics. */
    const CARRIER_NAME_SEKOLOGISTICS = 'SEKOLOGISTICS';

    /** TA-Q-BIN Parcel Hong Kong. */
    const CARRIER_NAME_HK_TAQBIN = 'HK_TAQBIN';

    /** <a href="https://apc-overnight.com/">APC Overnight UK</a>. */
    const CARRIER_NAME_GB_APC = 'GB_APC';

    /** Canpar Courier Canada. */
    const CARRIER_NAME_CA_CANPAR_COURIER = 'CA_CANPAR_COURIER';

    /** Estes Global. */
    const CARRIER_NAME_GLOBAL_ESTES = 'GLOBAL_ESTES';

    /** Greyhound Canada. */
    const CARRIER_NAME_CA_GREYHOUND = 'CA_GREYHOUND';

    /** Purolator. */
    const CARRIER_NAME_PUROLATOR = 'PUROLATOR';

    /** RL US. */
    const CARRIER_NAME_US_RL = 'US_RL';

    /** <a href="https://www.brt.it/en/bartolini_services/italy_service.do">BRT Corriere Espresso Italy</a>. */
    const CARRIER_NAME_IT_BRT = 'IT_BRT';

    /** DMM Network. */
    const CARRIER_NAME_DMM_NETWORK = 'DMM_NETWORK';

    /** Fercam Italy. */
    const CARRIER_NAME_IT_FERCAM = 'IT_FERCAM';

    /** Hermes Italy. */
    const CARRIER_NAME_HERMES_IT = 'HERMES_IT';

    /** Poste Italiane. */
    const CARRIER_NAME_IT_POSTE_ITALIANE = 'IT_POSTE_ITALIANE';

    /** <a href="https://www.sda.it/SITO_SDA-INSIDEX-WEB/pages/Home_it/119">SDA Express Courier</a>. */
    const CARRIER_NAME_IT_SDA = 'IT_SDA';

    /** SGT Corriere Espresso Italy. */
    const CARRIER_NAME_IT_SGT = 'IT_SGT';

    /** Skynet Global. */
    const CARRIER_NAME_GLOBAL_SKYNET = 'GLOBAL_SKYNET';

    /** <a href="https://bert.fr/">Bert France</a>. */
    const CARRIER_NAME_FR_BERT = 'FR_BERT';

    /** Colis France. */
    const CARRIER_NAME_FR_COLIS = 'FR_COLIS';

    /** Geodis France. */
    const CARRIER_NAME_FR_GEODIS = 'FR_GEODIS';

    /** Laposte France. */
    const CARRIER_NAME_FR_LAPOSTE = 'FR_LAPOSTE';

    /** Teliway France. */
    const CARRIER_NAME_FR_TELIWAY = 'FR_TELIWAY';

    /** DPD Poland. */
    const CARRIER_NAME_DPD_POLAND = 'DPD_POLAND';

    /** InPost Paczkomaty. */
    const CARRIER_NAME_INPOST_PACZKOMATY = 'INPOST_PACZKOMATY';

    /** Poczta Poland. */
    const CARRIER_NAME_POL_POCZTA = 'POL_POCZTA';

    /** Siodemka Poland. */
    const CARRIER_NAME_POL_SIODEMKA = 'POL_SIODEMKA';

    /** <a href="https://www.correos.es/ss/Satellite/site/pagina-inicio/info">Sociedad Estatal Correos y Telégrafos</a>. */
    const CARRIER_NAME_ESP_CORREOS = 'ESP_CORREOS';

    /** <a href="https://www.correos.es/ss/Satellite/site/pagina-inicio/info">Sociedad Estatal Correos y Telégrafos</a>. */
    const CARRIER_NAME_ES_CORREOS = 'ES_CORREOS';

    /** <a href="https://www.nacex.es/cambiarIdioma.do?idioma=EN">Nacex Spain</a>. */
    const CARRIER_NAME_ESP_NACEX = 'ESP_NACEX';

    /** <a href="https://www.parcelmonitor.com/track-spain/">Parcel Monitor Spain</a>. */
    const CARRIER_NAME_ESP_ASM = 'ESP_ASM';

    /** <a href="https://www.redur.es/">Redur Spain</a>. */
    const CARRIER_NAME_ESP_REDUR = 'ESP_REDUR';

    /** <a href="https://www.cbl-logistica.com">CBL Logística</a>. */
    const CARRIER_NAME_CBL_LOGISTICA = 'CBL_LOGISTICA';

    /** Ekart. */
    const CARRIER_NAME_EKART = 'EKART';

    /** <a href="https://www.delhivery.com/">Delhivery India</a>. */
    const CARRIER_NAME_IND_DELHIVERY = 'IND_DELHIVERY';

    /** <a href="https://www.bluedart.com/">Blue Dart Express DHL</a>. */
    const CARRIER_NAME_IND_BLUEDART = 'IND_BLUEDART';

    /** DTDC India. */
    const CARRIER_NAME_IND_DTDC = 'IND_DTDC';

    /** Professional Couriers India. */
    const CARRIER_NAME_IND_PROFESSIONAL_COURIERS = 'IND_PROFESSIONAL_COURIERS';

    /** Red Express India. */
    const CARRIER_NAME_IND_REDEXPRESS = 'IND_REDEXPRESS';

    /** XpressBees India. */
    const CARRIER_NAME_IND_XPRESSBEES = 'IND_XPRESSBEES';

    /** <a href="https://dotzot.in/">DotZot India</a>. */
    const CARRIER_NAME_IND_DOTZOT = 'IND_DOTZOT';

    /** Kerry Thailand. */
    const CARRIER_NAME_THA_KERRY = 'THA_KERRY';

    /** SendIt. */
    const CARRIER_NAME_SENDIT = 'SENDIT';

    /** <a href="https://www.acommerce.asia/">aCommerce</a>. */
    const CARRIER_NAME_ACOMMERCE = 'ACOMMERCE';

    /** Ninjavan Thailand. */
    const CARRIER_NAME_NINJAVAN_THAI = 'NINJAVAN_THAI';

    /** <a href="https://www.nimexpress.com/web/p/">Nim Express</a>. */
    const CARRIER_NAME_NIM_EXPRESS = 'NIM_EXPRESS';

    /** Thailand Post. */
    const CARRIER_NAME_THA_THAILAND_POST = 'THA_THAILAND_POST';

    /** Dynamic Logistics Thailand. */
    const CARRIER_NAME_THA_DYNAMIC_LOGISTICS = 'THA_DYNAMIC_LOGISTICS';

    /** Alphafast. */
    const CARRIER_NAME_ALPHAFAST = 'ALPHAFAST';

    /** Fastrak Thailand. */
    const CARRIER_NAME_FASTRAK_TH = 'FASTRAK_TH';

    /** EParcel Korea. */
    const CARRIER_NAME_EPARCEL_KR = 'EPARCEL_KR';

    /** <a href="https://www.cjlogistics.com/en/network/th-th">CJ Logistics in Thailand</a>. */
    const CARRIER_NAME_CJ_KOREA_THAI = 'CJ_KOREA_THAI';

    /** Rincos. */
    const CARRIER_NAME_RINCOS = 'RINCOS';

    /** Korea Post. */
    const CARRIER_NAME_KOR_KOREA_POST = 'KOR_KOREA_POST';

    /** CJ Korea. */
    const CARRIER_NAME_KOR_CJ = 'KOR_CJ';

    /** Ecargo Korea. */
    const CARRIER_NAME_KOR_ECARGO = 'KOR_ECARGO';

    /** <a href="https://www.srekorea.co.kr/home/">SRE Korea</a>. */
    const CARRIER_NAME_SREKOREA = 'SREKOREA';

    /** <a href="https://www.rocketparcel.com/">Rocket Parcel International</a>. */
    const CARRIER_NAME_ROCKETPARCEL = 'ROCKETPARCEL';

    /** <a href="https://www.bgpost.bg/">Bulgarian Post</a>. */
    const CARRIER_NAME_BG_BULGARIAN_POST = 'BG_BULGARIAN_POST';

    /** <a href="https://www.post.japanpost.jp/index_en.html">Japan Post</a>. */
    const CARRIER_NAME_JPN_JAPAN_POST = 'JPN_JAPAN_POST';

    /** Yamato Japan. */
    const CARRIER_NAME_JPN_YAMATO = 'JPN_YAMATO';

    /** Sagawa Japan. */
    const CARRIER_NAME_JPN_SAGAWA = 'JPN_SAGAWA';

    /** PTT Turkey. */
    const CARRIER_NAME_TUR_PTT = 'TUR_PTT';

    /** Austrian Post. */
    const CARRIER_NAME_AUT_AUSTRIAN_POST = 'AUT_AUSTRIAN_POST';

    /** Austrian Post. */
    const CARRIER_NAME_AU_AUSTRIAN_POST = 'AU_AUSTRIAN_POST';

    /** Russian Post. */
    const CARRIER_NAME_RUSSIAN_POST = 'RUSSIAN_POST';

    /** DHL Belgium. */
    const CARRIER_NAME_BEL_DHL = 'BEL_DHL';

    /** Mondial France. */
    const CARRIER_NAME_FR_MONDIAL = 'FR_MONDIAL';

    /** <a href="https://parcel.bpost.be/">bpost</a>. */
    const CARRIER_NAME_EU_BPOST = 'EU_BPOST';

    /** Landmark Global. */
    const CARRIER_NAME_LANDMARK_GLOBAL = 'LANDMARK_GLOBAL';

    /** Indonesia Post. */
    const CARRIER_NAME_IDN_POS = 'IDN_POS';

    /** Indonesia Post International. */
    const CARRIER_NAME_IDN_POS_INT = 'IDN_POS_INT';

    /** JNE Indonesia. */
    const CARRIER_NAME_IDN_JNE = 'IDN_JNE';

    /** Pandu Indonesia. */
    const CARRIER_NAME_IDN_PANDU = 'IDN_PANDU';

    /** RPX International. */
    const CARRIER_NAME_RPX = 'RPX';

    /** Tiki Indonesia. */
    const CARRIER_NAME_IDN_TIKI = 'IDN_TIKI';

    /** Lion Parcel Indonesia. */
    const CARRIER_NAME_IDN_LION_PARCEL = 'IDN_LION_PARCEL';

    /** Ninjavan Indonesia. */
    const CARRIER_NAME_NINJAVAN_ID = 'NINJAVAN_ID';

    /** Wahana Indonesia. */
    const CARRIER_NAME_IDN_WAHANA = 'IDN_WAHANA';

    /** First Logistics Indonesia. */
    const CARRIER_NAME_IDN_FIRST_LOGISTICS = 'IDN_FIRST_LOGISTICS';

    /** <a href="https://addresspal.anpost.ie/">AddressPay UK</a>. */
    const CARRIER_NAME_UK_AN_POST = 'UK_AN_POST';

    /** DPD Global. */
    const CARRIER_NAME_DPD = 'DPD';

    /** Fastway UK. */
    const CARRIER_NAME_UK_FASTWAY = 'UK_FASTWAY';

    /** Nightline UK. */
    const CARRIER_NAME_UK_NIGHTLINE = 'UK_NIGHTLINE';

    /** Wiseloads. */
    const CARRIER_NAME_WISELOADS = 'WISELOADS';

    /** Elta Greece. */
    const CARRIER_NAME_GR_ELTA = 'GR_ELTA';

    /** ACS Greece. */
    const CARRIER_NAME_GRC_ACS = 'GRC_ACS';

    /** Geniki Greece. */
    const CARRIER_NAME_GR_GENIKI = 'GR_GENIKI';

    /** Ninja Van Philippines. */
    const CARRIER_NAME_NINJAVAN_PHILIPPINES = 'NINJAVAN_PHILIPPINES';

    /** Xend Express Philippines. */
    const CARRIER_NAME_PHL_XEND_EXPRESS = 'PHL_XEND_EXPRESS';

    /** LBC Philippines. */
    const CARRIER_NAME_PHL_LBC = 'PHL_LBC';

    /** JamExpress Philippines. */
    const CARRIER_NAME_PHL_JAMEXPRESS = 'PHL_JAMEXPRESS';

    /** Airspeed Philippines. */
    const CARRIER_NAME_PHL_AIRSPEED = 'PHL_AIRSPEED';

    /** RAF Philippines. */
    const CARRIER_NAME_PHL_RAF = 'PHL_RAF';

    /** Directlog. */
    const CARRIER_NAME_DIRECTLOG = 'DIRECTLOG';

    /** Correios Brazil. */
    const CARRIER_NAME_BRA_CORREIOS = 'BRA_CORREIOS';

    /** DHL Netherlands. */
    const CARRIER_NAME_NLD_DHL = 'NLD_DHL';

    /** <a href="https://www.postnl.com">PostNL Netherlands</a>. */
    const CARRIER_NAME_NLD_POSTNL = 'NLD_POSTNL';

    /** <a href="https://gls-group.eu/">General Logistics Systems (GLS) Netherlands</a>. */
    const CARRIER_NAME_NLD_GLS = 'NLD_GLS';

    /** Transmission Netherlands. */
    const CARRIER_NAME_NLD_TRANSMISSION = 'NLD_TRANSMISSION';

    /** <a href="https://www.correosdemexico.com.mx/Paginas/Inicio.asp/">Mex Post Correos de Mexico</a>. */
    const CARRIER_NAME_CORREOS_DE_MEXICO = 'CORREOS_DE_MEXICO';

    /** <a href="https://www.estafeta.com/">Estafeta Mexico</a>. */
    const CARRIER_NAME_MEX_ESTAFETA = 'MEX_ESTAFETA';

    /** Senda Mexico. */
    const CARRIER_NAME_MEX_SENDA = 'MEX_SENDA';

    /** Redpack Mexico. */
    const CARRIER_NAME_MEX_REDPACK = 'MEX_REDPACK';

    /** Aeroflash Mexico. */
    const CARRIER_NAME_MEX_AEROFLASH = 'MEX_AEROFLASH';

    /** Nationwide Malaysia. */
    const CARRIER_NAME_NATIONWIDE_MY = 'NATIONWIDE_MY';

    /** <a href="https://www.pos.com.my/">Pos Malaysia</a>. */
    const CARRIER_NAME_MYS_MYS_POST = 'MYS_MYS_POST';

    /** TA-Q-BIN Parcel Malaysia. */
    const CARRIER_NAME_MYS_TAQBIN = 'MYS_TAQBIN';

    /** Skynet Malaysia. */
    const CARRIER_NAME_MYS_SKYNET = 'MYS_SKYNET';

    /** Citylink Malaysia. */
    const CARRIER_NAME_MYS_CITYLINK = 'MYS_CITYLINK';

    /** Airpak Malaysia. */
    const CARRIER_NAME_MYS_AIRPAK = 'MYS_AIRPAK';

    /** Ninjavan Malaysia. */
    const CARRIER_NAME_NINJAVAN_MY = 'NINJAVAN_MY';

    /** Kangaroo Express Malaysia. */
    const CARRIER_NAME_KANGAROO_MY = 'KANGAROO_MY';

    /** Vietnam Post. */
    const CARRIER_NAME_VNM_VIETNAM_POST = 'VNM_VIETNAM_POST';

    /** Post EMS Vietnam. */
    const CARRIER_NAME_VNPOST_EMS = 'VNPOST_EMS';

    /** <a href="https://www.seur.com/en/">Internationational Seur Portugal</a>. */
    const CARRIER_NAME_PRT_INT_SEUR = 'PRT_INT_SEUR';

    /** <a href="https://www.cttexpresso.pt/home/">CTT Expresso Portugal</a>. */
    const CARRIER_NAME_PRT_CTT = 'PRT_CTT';

    /** Chronopost Portugal. */
    const CARRIER_NAME_PRT_CHRONOPOST = 'PRT_CHRONOPOST';

    /** <a href="https://www.seur.com/pt/">Seur Portugal</a>. */
    const CARRIER_NAME_PRT_SEUR = 'PRT_SEUR';

    /** Adicional. */
    const CARRIER_NAME_ADICIONAL = 'ADICIONAL';

    /** Lietuvos paštas Lithuania. */
    const CARRIER_NAME_LTU_LIETUVOS = 'LTU_LIETUVOS';

    /** <a href="https://dpex.com/">DPEX Worldwide</a>. */
    const CARRIER_NAME_DPEX = 'DPEX';

    /** LWE Hong Kong. */
    const CARRIER_NAME_LWE_HK = 'LWE_HK';

    /** Singapore Post. */
    const CARRIER_NAME_SG_SG_POST = 'SG_SG_POST';

    /** TA-Q-BIN Parcel Singapore. */
    const CARRIER_NAME_SG_TAQBIN = 'SG_TAQBIN';

    /** Ninjavan Singapore. */
    const CARRIER_NAME_SG_NINJAVAN = 'SG_NINJAVAN';

    /** Zalora Singapore. */
    const CARRIER_NAME_SG_ZALORA = 'SG_ZALORA';

    /** Jetship. */
    const CARRIER_NAME_JET_SHIP = 'JET_SHIP';

    /** Parcel Post Singapore. */
    const CARRIER_NAME_SG_PARCELPOST = 'SG_PARCELPOST';

    /** Swiss Post. */
    const CARRIER_NAME_CHE_SWISS_POST = 'CHE_SWISS_POST';

    /** Asendia Hong Kong. */
    const CARRIER_NAME_ASENDIA_HK = 'ASENDIA_HK';

    /** <a href="https://www.posta.hu/">Magyar Posta</a>. */
    const CARRIER_NAME_HUN_MAGYAR = 'HUN_MAGYAR';

    /** Post Nord Logistics. */
    const CARRIER_NAME_POSTNORD_LOGISTICS = 'POSTNORD_LOGISTICS';

    /** <a href="https://www.directlink.com/">Direct Link Sweden</a>. */
    const CARRIER_NAME_SWE_DIRECTLINK = 'SWE_DIRECTLINK';

    /** <a href="https://www.postnord.se/">PostNord Sverige</a>. */
    const CARRIER_NAME_SWE_POSTNORD = 'SWE_POSTNORD';

    /** <a href="https://www.dbschenker.com/se-sv">DB Schenker Sweden</a>. */
    const CARRIER_NAME_SWE_DB = 'SWE_DB';

    /** <a href="https://www.ceskaposta.cz/en/">Česká pošta</a>. */
    const CARRIER_NAME_CZE_CESKA = 'CZE_CESKA';

    /** <a href="https://www.nzpost.co.nz/tools/tracking">New Zealand Post Limited (NZ)</a>. */
    const CARRIER_NAME_NZ_NZ_POST = 'NZ_NZ_POST';

    /** <a href="https://www.courierpost.co.nz/track/track-and-trace/">CourierPost New Zealand</a>. */
    const CARRIER_NAME_NZ_COURIER_POST = 'NZ_COURIER_POST';

    /** Fastway New Zealand. */
    const CARRIER_NAME_FASTWAY_NZ = 'FASTWAY_NZ';

    /** <a href="https://www.post.gov.tw/post/internet/index.jsp">Chunghwa Post</a>. */
    const CARRIER_NAME_TW_TAIWAN_POST = 'TW_TAIWAN_POST';

    /** Spreadel. */
    const CARRIER_NAME_SPREADEL = 'SPREADEL';

    /** <a href="https://www.epg.gov.ae/_en/index.xhtml">Emirates Post Group</a>. */
    const CARRIER_NAME_ARE_EMIRATES_POST = 'ARE_EMIRATES_POST';

    /** <a href="https://couriertrackingrobo.com/track/company-details.php?id=axl">AXL Express & Logistics</a>. */
    const CARRIER_NAME_AXL = 'AXL';

    /** <a href="https://www.cypruspost.post/en/home">Cyprus Post</a>. */
    const CARRIER_NAME_CYP_CYPRUS_POST = 'CYP_CYPRUS_POST';

    /** <a href="https://www.posta.hr/">Hrvatska Pošta</a>. */
    const CARRIER_NAME_HRV_HRVATSKA = 'HRV_HRVATSKA';

    /** <a href="https://www.posten.no/en/">Posten Norge</a>. */
    const CARRIER_NAME_NOR_POSTEN = 'NOR_POSTEN';

    /** <a href="https://www.jpshipping.co.uk/services/personal_effects">JP RAM Shipping</a>. */
    const CARRIER_NAME_RAM = 'RAM';

    /** <a href="https://www.thecourierguy.co.za/">The Courier Guy</a>. */
    const CARRIER_NAME_THECOURIERGUY = 'THECOURIERGUY';

    /** <a href="http://www.fastway.co.za/">Fastway Couriers (South Africa)</a>. */
    const CARRIER_NAME_ZA_FASTWAY = 'ZA_FASTWAY';

    /** DPE Express. */
    const CARRIER_NAME_DPE_EXPRESS = 'DPE_EXPRESS';

    /** Posti. */
    const CARRIER_NAME_POSTI = 'POSTI';

    /** Matkahuoloto. */
    const CARRIER_NAME_MATKAHUOLTO = 'MATKAHUOLTO';

    /** DHL Global. */
    const CARRIER_NAME_GLOBAL_DHL = 'GLOBAL_DHL';

    /** <a href="https://www.correoargentino.com.ar/">Correo Argentino</a>. */
    const CARRIER_NAME_ARG_CORREO = 'ARG_CORREO';

    /** <a href="https://www.oca.com.ar/">OCA Argentia</a>. */
    const CARRIER_NAME_ARG_OCA = 'ARG_OCA';

    /** <a href="https://www.posta.rs/default-eng.asp">Post of Serbia</a>. */
    const CARRIER_NAME_POST_SERBIA = 'POST_SERBIA';

    /** <a href="https://www.posta.ba/en/track-trace-2/">BH POŠTA</a>. */
    const CARRIER_NAME_BH_POSTA = 'BH_POSTA';

    /** <a href="https://www.correos.cl/SitePages/home.asp/">CorreosChile</a>. */
    const CARRIER_NAME_CORREOS_CHILE = 'CORREOS_CHILE';

    /** APR 72. */
    const CARRIER_NAME_APR_72 = 'APR_72';

    /** <a href="https://www.correos.go.cr/">Correos de Costa Rica</a>. */
    const CARRIER_NAME_CORREOS_DE_COSTA_RICA = 'CORREOS_DE_COSTA_RICA';

    /** Postur. */
    const CARRIER_NAME_POSTUR_IS = 'POSTUR_IS';

    /** Speedex Courier. */
    const CARRIER_NAME_SPEEDEXCOURIER = 'SPEEDEXCOURIER';

    /** <a href="https://www.posta-romana.ro/en">Poșta Română</a>. */
    const CARRIER_NAME_ROU_POSTA = 'ROU_POSTA';

    /** <a href="https://novaposhta.ua/en">Nova Poshta</a>. */
    const CARRIER_NAME_UKR_NOVA = 'UKR_NOVA';

    /** <a href="https://ukrposhta.ua/en/vidslidkuvati-forma-poshuku">Ukrposhta - Ukraine's National Post</a>. */
    const CARRIER_NAME_UKR_POSHTA = 'UKR_POSHTA';

    /** <a href="https://www.nipost.gov.ng//">Nigerian Postal Service</a>. */
    const CARRIER_NAME_NGA_NIPOST = 'NGA_NIPOST';

    /** <a href="https://www.courierplus-ng.com/">Courier Plus Nigeria</a>. */
    const CARRIER_NAME_NG_COURIERPLUS = 'NG_COURIERPLUS';

    /** EShopWorld. */
    const CARRIER_NAME_ESHOPWORLD = 'ESHOPWORLD';

    /** WebInterpret. */
    const CARRIER_NAME_WEBINTERPRET = 'WEBINTERPRET';

    /** Hermes. */
    const CARRIER_NAME_HERMES = 'HERMES';

    /** ABC Mail. */
    const CARRIER_NAME_ABC_MAIL = 'ABC_MAIL';

    /** Aramex. */
    const CARRIER_NAME_ARAMEX = 'ARAMEX';

    /** <a href="https://www.yw56.com.cn/">Yanwen Express</a>. */
    const CARRIER_NAME_YANWEN = 'YANWEN';

    /** International Bridge. */
    const CARRIER_NAME_INTERNATIONAL_BRIDGE = 'INTERNATIONAL_BRIDGE';

    /** <a href="https://www.sfcservice.com/">SFC Logistics</a>. */
    const CARRIER_NAME_SFC_LOGISTICS = 'SFC_LOGISTICS';

    /** BQC Express. */
    const CARRIER_NAME_BQC_EXPRESS = 'BQC_EXPRESS';

    /** One World. */
    const CARRIER_NAME_ONE_WORLD = 'ONE_WORLD';

    /** Registered Mail Italy. */
    const CARRIER_NAME_IT_REGISTER_MAIL = 'IT_REGISTER_MAIL';

    /** WinIt. */
    const CARRIER_NAME_WINIT = 'WINIT';

    /** Continental. */
    const CARRIER_NAME_CONTINENTAL = 'CONTINENTAL';

    /** <a href="https://www.efstrans.com/">Enterprise Freight Systems (EFS)</a>. */
    const CARRIER_NAME_EFS = 'EFS';

    /** Pantos. */
    const CARRIER_NAME_PANTOS = 'PANTOS';

    /** <a href="https://www.relaiscolis.com/">Relais Colis</a>. */
    const CARRIER_NAME_RELAIS_COLIS = 'RELAIS_COLIS';

    /** DHL Express US. */
    const CARRIER_NAME_US_DHL_EXPRESS = 'US_DHL_EXPRESS';

    /** DHL Parcel US. */
    const CARRIER_NAME_US_DHL_PARCEL = 'US_DHL_PARCEL';

    /** <a href="https://www.logistics.dhl/us-en/home/tracking/tracking-ecommerce.html">DHL eCommerce US</a>. */
    const CARRIER_NAME_US_DHL_ECOMMERCE = 'US_DHL_ECOMMERCE';

    /** DHL Global Forwarding US. */
    const CARRIER_NAME_US_DHL_GLOBALFORWARDING = 'US_DHL_GLOBALFORWARDING';

    /** DHL Express UK. */
    const CARRIER_NAME_UK_DHL_EXPRESS = 'UK_DHL_EXPRESS';

    /** DHL Parcel UK. */
    const CARRIER_NAME_UK_DHL_PARCEL = 'UK_DHL_PARCEL';

    /** DHL Global Forwarding UK. */
    const CARRIER_NAME_UK_DHL_GLOBALFORWARDING = 'UK_DHL_GLOBALFORWARDING';

    /** DHL Express Canada. */
    const CARRIER_NAME_CN_DHL_EXPRESS = 'CN_DHL_EXPRESS';

    /** DHL eCommerce China. */
    const CARRIER_NAME_CN_DHL_ECOMMERCE = 'CN_DHL_ECOMMERCE';

    /** DHL Global Forwarding China. */
    const CARRIER_NAME_CN_DHL_GLOBALFORWARDING = 'CN_DHL_GLOBALFORWARDING';

    /** DHL Express Germany. */
    const CARRIER_NAME_DE_DHL_EXPRESS = 'DE_DHL_EXPRESS';

    /** DHL Parcel Germany. */
    const CARRIER_NAME_DE_DHL_PARCEL = 'DE_DHL_PARCEL';

    /** DHL Packet Germany. */
    const CARRIER_NAME_DE_DHL_PACKET = 'DE_DHL_PACKET';

    /** DHL eCommerce Germany. */
    const CARRIER_NAME_DE_DHL_ECOMMERCE = 'DE_DHL_ECOMMERCE';

    /** DHL Global Forwarding Germany. */
    const CARRIER_NAME_DE_DHL_GLOBALFORWARDING = 'DE_DHL_GLOBALFORWARDING';

    /** DHL Deutschepost Germany. */
    const CARRIER_NAME_DE_DHL_DEUTSCHEPOST = 'DE_DHL_DEUTSCHEPOST';

    /** DHL Express Australia. */
    const CARRIER_NAME_AU_DHL_EXPRESS = 'AU_DHL_EXPRESS';

    /** DHL eCommerce Australia. */
    const CARRIER_NAME_AU_DHL_ECOMMERCE = 'AU_DHL_ECOMMERCE';

    /** DHL Global Forwarding Australia. */
    const CARRIER_NAME_AU_DHL_GLOBALFORWARDING = 'AU_DHL_GLOBALFORWARDING';

    /** DHL Express Hong Kong. */
    const CARRIER_NAME_HK_DHL_EXPRESS = 'HK_DHL_EXPRESS';

    /** DHL eCommerce Hong Kong. */
    const CARRIER_NAME_HK_DHL_ECOMMERCE = 'HK_DHL_ECOMMERCE';

    /** DHL Global Forwarding Hong Kong. */
    const CARRIER_NAME_HK_DHL_GLOBALFORWARDING = 'HK_DHL_GLOBALFORWARDING';

    /** DHL Express Canada. */
    const CARRIER_NAME_CA_DHL_EXPRESS = 'CA_DHL_EXPRESS';

    /** DHL eCommerce Canada. */
    const CARRIER_NAME_CA_DHL_ECOMMERCE = 'CA_DHL_ECOMMERCE';

    /** DHL Global Forwarding Canada. */
    const CARRIER_NAME_CA_DHL_GLOBALFORWARDING = 'CA_DHL_GLOBALFORWARDING';

    /** DHL Express Italy. */
    const CARRIER_NAME_IT_DHL_EXPRESS = 'IT_DHL_EXPRESS';

    /** DHL eCommerce Italy. */
    const CARRIER_NAME_IT_DHL_ECOMMERCE = 'IT_DHL_ECOMMERCE';

    /** DHL Global Forwarding Italy. */
    const CARRIER_NAME_IT_DHL_GLOBALFORWARDING = 'IT_DHL_GLOBALFORWARDING';

    /** DHL Express France. */
    const CARRIER_NAME_FR_DHL_EXPRESS = 'FR_DHL_EXPRESS';

    /** DHL Parcel France. */
    const CARRIER_NAME_FR_DHL_PARCEL = 'FR_DHL_PARCEL';

    /** DHL Global Forwarding France. */
    const CARRIER_NAME_FR_DHL_GLOBALFORWARDING = 'FR_DHL_GLOBALFORWARDING';

    /** DHL Express Poland. */
    const CARRIER_NAME_PL_DHL_EXPRESS = 'PL_DHL_EXPRESS';

    /** DHL Parcel Poland. */
    const CARRIER_NAME_PL_DHL_PARCEL = 'PL_DHL_PARCEL';

    /** <a href="https://www.logistics.dhl/pl-en/home/our-divisions/global-forwarding.html">DHL Global Forwarding Poland</a> */
    const CARRIER_NAME_PL_DHL_GLOBALFORWARDING = 'PL_DHL_GLOBALFORWARDING';

    /** <a href="https://abcpkg.com/">ABC Package Express</a>. */
    const CARRIER_NAME_ABC_PACKAGE = 'ABC_PACKAGE';

    /** <a href="https://www.anpost.com/">An Post Ireland</a>. */
    const CARRIER_NAME_AN_POST = 'AN_POST';

    /** <a href="https://apc-overnight.com/">APC Overnight</a>. */
    const CARRIER_NAME_APC_OVERNIGHT = 'APC_OVERNIGHT';

    /** <a href="https://www.aftership.com/es/couriers/asm">ASM Tracking Spain</a>. */
    const CARRIER_NAME_ASM_ES = 'ASM_ES';

    /** <a href="https://auspost.com.au/business/shipping/international-shipping/logistics-in-china">Logistics in China</a>. */
    const CARRIER_NAME_AUPOST_CN = 'AUPOST_CN';

    /** <a href="https://www.acommerce.asia/">aCommerce</a>. */
    const CARRIER_NAME_ACOMMMERCE = 'ACOMMMERCE';

    /** <a href="https://www.adicional.pt/">Adicional Logistics Portugal</a>. */
    const CARRIER_NAME_ADICIONAL_PT = 'ADICIONAL_PT';

    /** <a href="https://www.air21.com.ph/main/index.php">Air 21</a>. */
    const CARRIER_NAME_AIR_21 = 'AIR_21';

    /** Airborne Express UK. */
    const CARRIER_NAME_AIRBORNE_EXPRESS_UK = 'AIRBORNE_EXPRESS_UK';

    /** Airpak Malaysia. */
    const CARRIER_NAME_AIRPAK_MY = 'AIRPAK_MY';

    /** Airspeed. */
    const CARRIER_NAME_AIRSPEED = 'AIRSPEED';

    /** Asendia Germany. */
    const CARRIER_NAME_ASENDIA_DE = 'ASENDIA_DE';

    /** <a href="https://www.asendiausa.com/">Asendia USA</a>. */
    const CARRIER_NAME_ASENDIA_US = 'ASENDIA_US';

    /** Australia Post. */
    const CARRIER_NAME_AUSTRALIA_POST = 'AUSTRALIA_POST';

    /** Toll Australia. */
    const CARRIER_NAME_TOLL_AU = 'TOLL_AU';

    /** Austrian Post Express. */
    const CARRIER_NAME_AUSTRIAN_POST_EXPRESS = 'AUSTRIAN_POST_EXPRESS';

    /** Austrian Post Registered. */
    const CARRIER_NAME_AUSTRIAN_POST = 'AUSTRIAN_POST';

    /** B2C Europe. */
    const CARRIER_NAME_B_TWO_C_EUROPE = 'B_TWO_C_EUROPE';

    /** <a href="https://bert.fr/">Groupe Bert</a>. */
    const CARRIER_NAME_BERT = 'BERT';

    /** BPost. */
    const CARRIER_NAME_BPOST = 'BPOST';

    /** BRT Bartolini. */
    const CARRIER_NAME_BRT_IT = 'BRT_IT';

    /** Bluedart. */
    const CARRIER_NAME_BLUEDART = 'BLUEDART';

    /** Bonds Couriers. */
    const CARRIER_NAME_BONDS_COURIERS = 'BONDS_COURIERS';

    /** <a href="https://landmarkglobal.com/welcome">bpost International</a>. */
    const CARRIER_NAME_BPOST_INT = 'BPOST_INT';

    /** Bulgarian Post. */
    const CARRIER_NAME_BULGARIAN_POST = 'BULGARIAN_POST';

    /** <a href="https://www.cjlogistics.com/en/main">CJ Logistics</a>. */
    const CARRIER_NAME_CJ_LOGISTICS = 'CJ_LOGISTICS';

    /** CJ Malaysia International. */
    const CARRIER_NAME_CJ_INT_MY = 'CJ_INT_MY';

    /** CJ Malaysia. */
    const CARRIER_NAME_CJ_MY = 'CJ_MY';

    /** CJ Thailand. */
    const CARRIER_NAME_CJ_TH = 'CJ_TH';

    /** Canada Post. */
    const CARRIER_NAME_CANADA_POST = 'CANADA_POST';

    /** <a href="https://www.canpar.com/en/home.jsp">Canpar Express</a>. */
    const CARRIER_NAME_CANPAR = 'CANPAR';

    /** <a href="https://www.postaonline.cz/en/trackandtrace">Česká Pošta</a>. */
    const CARRIER_NAME_CESKA_CZ = 'CESKA_CZ';

    /** <a href="https://www.chronopost.fr/en#/step-home">Chronopost France</a>. */
    const CARRIER_NAME_CHRONOPOST_FR = 'CHRONOPOST_FR';

    /** <a href="https://www.chronopost.pt/en#/step-home">Chronopost Portugal</a>. */
    const CARRIER_NAME_CHRONOPOST_PT = 'CHRONOPOST_PT';

    /** Chunghwa Post. */
    const CARRIER_NAME_CHUNGHWA_POST = 'CHUNGHWA_POST';

    /** CityLink Malaysia. */
    const CARRIER_NAME_CITYLINK_MY = 'CITYLINK_MY';

    /** Coliposte. */
    const CARRIER_NAME_COLIPOSTE = 'COLIPOSTE';

    /** Colis France. */
    const CARRIER_NAME_COLIS = 'COLIS';

    /** <a href="https://www.collectplus.co.uk/">CollectPlus</a>. */
    const CARRIER_NAME_COLLECTPLUS = 'COLLECTPLUS';

    /** Correos Argentina. */
    const CARRIER_NAME_CORREOS_AG = 'CORREOS_AG';

    /** Correos Brazil. */
    const CARRIER_NAME_CORREOS_BR = 'CORREOS_BR';

    /** Correos Chile. */
    const CARRIER_NAME_CORREOS_CL = 'CORREOS_CL';

    /** Correos De Costa Rica. */
    const CARRIER_NAME_CORREOS_CR = 'CORREOS_CR';

    /** Correos De Mexico. */
    const CARRIER_NAME_CORREOS_MX = 'CORREOS_MX';

    /** Correos De Spain. */
    const CARRIER_NAME_CORREOS_ES = 'CORREOS_ES';

    /** Correos Express. */
    const CARRIER_NAME_CORREOS_EXPRESS = 'CORREOS_EXPRESS';

    /** Courier Plus. */
    const CARRIER_NAME_COURIERPLUS = 'COURIERPLUS';

    /** Courier Post. */
    const CARRIER_NAME_COURIER_POST = 'COURIER_POST';

    /** Cyprus Post. */
    const CARRIER_NAME_CYPRUS_POST_CYP = 'CYPRUS_POST_CYP';

    /** DB Schenker Sweden. */
    const CARRIER_NAME_DBSCHENKER_SE = 'DBSCHENKER_SE';

    /** DHL Spain. */
    const CARRIER_NAME_DHL_ES = 'DHL_ES';

    /** DHL Active Tracing. */
    const CARRIER_NAME_DHL_ACTIVE_TRACING = 'DHL_ACTIVE_TRACING';

    /** DHL Australia. */
    const CARRIER_NAME_DHL_AU = 'DHL_AU';

    /** DHL Benelux. */
    const CARRIER_NAME_DHL_BENELUX = 'DHL_BENELUX';

    /** DHL Deutsche Post. */
    const CARRIER_NAME_DHL_DEUTSCHE_POST = 'DHL_DEUTSCHE_POST';

    /** DHL France. */
    const CARRIER_NAME_DHL_FR = 'DHL_FR';

    /** DHL Global eCommerce. */
    const CARRIER_NAME_DHL_GLOBAL_ECOMMERCE = 'DHL_GLOBAL_ECOMMERCE';

    /** DHL Hong Kong. */
    const CARRIER_NAME_DHL_HK = 'DHL_HK';

    /** DHL Italy. */
    const CARRIER_NAME_DHL_IT = 'DHL_IT';

    /** DHL Japan. */
    const CARRIER_NAME_DHL_JP = 'DHL_JP';

    /** DHL Netherlands. */
    const CARRIER_NAME_DHL_NL = 'DHL_NL';

    /** DHL Packet. */
    const CARRIER_NAME_DHL_PACKET = 'DHL_PACKET';

    /** DHL Parcel Netherlands. */
    const CARRIER_NAME_DHL_PARCEL_NL = 'DHL_PARCEL_NL';

    /** DHL Parcel Spain. */
    const CARRIER_NAME_DHL_PARCEL_ES = 'DHL_PARCEL_ES';

    /** DHL Poland. */
    const CARRIER_NAME_DHL_PL = 'DHL_PL';

    /** DHL Singapore. */
    const CARRIER_NAME_DHL_SG = 'DHL_SG';

    /** DHL UK. */
    const CARRIER_NAME_DHL_UK = 'DHL_UK';

    /** DHL eCommerce Asia. */
    const CARRIER_NAME_DHL_GLOBAL_MAIL_ASIA = 'DHL_GLOBAL_MAIL_ASIA';

    /** DHL eCommerce US. */
    const CARRIER_NAME_DHL_GLOBAL_MAIL = 'DHL_GLOBAL_MAIL';

    /** DHL Austria. */
    const CARRIER_NAME_DHL_AT = 'DHL_AT';

    /** DPD Delistrack. */
    const CARRIER_NAME_DPD_DELISTRACK = 'DPD_DELISTRACK';

    /** DPD France. */
    const CARRIER_NAME_DPD_FR = 'DPD_FR';

    /** DPD Germany. */
    const CARRIER_NAME_DPD_DE = 'DPD_DE';

    /** DPD Hong Kong. */
    const CARRIER_NAME_DPD_HK = 'DPD_HK';

    /** DPD Ireland. */
    const CARRIER_NAME_DPD_IR = 'DPD_IR';

    /** DPD Local Reference. */
    const CARRIER_NAME_DPD_LOCAL_REF = 'DPD_LOCAL_REF';

    /** DPD Local. */
    const CARRIER_NAME_DPD_LOCAL = 'DPD_LOCAL';

    /** DPD Poland. */
    const CARRIER_NAME_DPD_PL = 'DPD_PL';

    /** DPD Romania. */
    const CARRIER_NAME_DPD_RO = 'DPD_RO';

    /** DPD Russia. */
    const CARRIER_NAME_DPD_RU = 'DPD_RU';

    /** DPD UK. */
    const CARRIER_NAME_DPD_UK = 'DPD_UK';

    /** <a href="https://www.dtdc.com/">DTDC Express Global</a>. */
    const CARRIER_NAME_DTDC_EXPRESS = 'DTDC_EXPRESS';

    /** <a href="https://www.dtdc.in/">DTDC India</a>. */
    const CARRIER_NAME_DTDC_IN = 'DTDC_IN';

    /** Dawn Wing. */
    const CARRIER_NAME_DAWN_WING = 'DAWN_WING';

    /** <a href="https://www.delhivery.com/">Delhivery India</a>. */
    const CARRIER_NAME_DELHIVERY_IN = 'DELHIVERY_IN';

    /** Deltec Germany. */
    const CARRIER_NAME_DELTEC_DE = 'DELTEC_DE';

    /** Deltec UK. */
    const CARRIER_NAME_DELTEC_UK = 'DELTEC_UK';

    /** <a href="https://www.deutschepost.de/sendung/simpleQuery.html">Deutsche Post</a>. */
    const CARRIER_NAME_DEUTSCHE_DE = 'DEUTSCHE_DE';

    /** <a href="https://www.directlink.com/">Direct Link Sweden</a>. */
    const CARRIER_NAME_DIRECTLINK_SE = 'DIRECTLINK_SE';

    /** Directlog. */
    const CARRIER_NAME_DIRECTLOG_BR = 'DIRECTLOG_BR';

    /** Dotzot. */
    const CARRIER_NAME_DOTZOT = 'DOTZOT';

    /** EC China. */
    const CARRIER_NAME_EC_CN = 'EC_CN';

    /** ELTA Greece. */
    const CARRIER_NAME_ELTA_GR = 'ELTA_GR';

    /** EMPS China. */
    const CARRIER_NAME_EMPS_CN = 'EMPS_CN';

    /** EMS China. */
    const CARRIER_NAME_EMS_CN = 'EMS_CN';

    /** Ecargo. */
    const CARRIER_NAME_ECARGO = 'ECARGO';

    /** Emirates Post. */
    const CARRIER_NAME_EMIRATES_POST = 'EMIRATES_POST';

    /** Ensenda USA. */
    const CARRIER_NAME_ENSENDA = 'ENSENDA';

    /** Estafeta. */
    const CARRIER_NAME_ESTAFETA = 'ESTAFETA';

    /** Estes. */
    const CARRIER_NAME_ESTES = 'ESTES';

    /** FERCAM Logistics & Transport. */
    const CARRIER_NAME_FERCAM_IT = 'FERCAM_IT';

    /** FLYT Express. */
    const CARRIER_NAME_FLYT_EXPRESS = 'FLYT_EXPRESS';

    /** FastTrack Thailand. */
    const CARRIER_NAME_FASTRACK = 'FASTRACK';

    /** Fastway USA. */
    const CARRIER_NAME_FASTWAY_US = 'FASTWAY_US';

    /** Fastway South Africa. */
    const CARRIER_NAME_FASTWAY_ZA = 'FASTWAY_ZA';

    /** Fastway UK. */
    const CARRIER_NAME_FASTWAY_UK = 'FASTWAY_UK';

    /** Fastway Australia. */
    const CARRIER_NAME_FASTWAY_AU = 'FASTWAY_AU';

    /** First Logistics. */
    const CARRIER_NAME_FIRST_LOGISITCS = 'FIRST_LOGISITCS';

    /** 4PX Express. */
    const CARRIER_NAME_FOUR_PX_EXPRESS = 'FOUR_PX_EXPRESS';

    /** GEODIS - Distribution & Express. */
    const CARRIER_NAME_GEODIS = 'GEODIS';

    /** <a href="https://gls-group.eu/CZ/cs/home/">GLS Czech Republic</a>. */
    const CARRIER_NAME_GLS_CZ = 'GLS_CZ';

    /** <a href="https://gls-group.eu/FR/fr/home">GLS France</a>. */
    const CARRIER_NAME_GLS_FR = 'GLS_FR';

    /** <a href="https://gls-group.eu/DE/de/home">GLS Germany</a>. */
    const CARRIER_NAME_GLS_DE = 'GLS_DE';

    /** <a href="https://www.gls-italy.com/">GLS Italy</a>. */
    const CARRIER_NAME_GLS_IT = 'GLS_IT';

    /** <a href="https://gls-group.eu/NL/nl/home">GLS Netherlands</a>. */
    const CARRIER_NAME_GLS_NL = 'GLS_NL';

    /** <a href="https://www.gls-spain.es/en/">GLS Spain</a>. */
    const CARRIER_NAME_GLS_ES = 'GLS_ES';

    /** <a href="https://gls-group.eu/EU/en/home">GLS</a>. */
    const CARRIER_NAME_GLS = 'GLS';

    /** <a href="https://www.parcelmonitor.com/track-greece/">Parcel Monitor Greece</a>. */
    const CARRIER_NAME_ACS_GR = 'ACS_GR';

    /** Geniki Greece. */
    const CARRIER_NAME_GENIKI_GR = 'GENIKI_GR';

    /** Globegistics USA. */
    const CARRIER_NAME_GLOBEGISTICS = 'GLOBEGISTICS';

    /** Greyhound. */
    const CARRIER_NAME_GREYHOUND = 'GREYHOUND';

    /** Hermes Germany. */
    const CARRIER_NAME_HERMES_DE = 'HERMES_DE';

    /** HermesWorld UK. */
    const CARRIER_NAME_HERMESWORLD_UK = 'HERMESWORLD_UK';

    /** Hong Kong Post. */
    const CARRIER_NAME_HK_POST = 'HK_POST';

    /** <a href="https://www.posta.hr/">Hrvatska Pošta</a>. */
    const CARRIER_NAME_HRVATSKA_HR = 'HRVATSKA_HR';

    /** Huahan Express. */
    const CARRIER_NAME_HUAHAN_EXPRESS = 'HUAHAN_EXPRESS';

    /** IMX France. */
    const CARRIER_NAME_IMX = 'IMX';

    /** <a href="https://alltrack.org/itis-courier-tracking">ITIS International Courier Tracking</a>. */
    const CARRIER_NAME_ITIS = 'ITIS';

    /** India Post. */
    const CARRIER_NAME_INDIA_POST = 'INDIA_POST';

    /** Interlink Express. */
    const CARRIER_NAME_INTERLINK = 'INTERLINK';

    /** International Seur. */
    const CARRIER_NAME_INT_SEUR = 'INT_SEUR';

    /** International Seur. */
    const CARRIER_NAME_INT_SUER = 'INT_SUER';

    /** Israel Post. */
    const CARRIER_NAME_ISRAEL_POST = 'ISRAEL_POST';

    /** JNE Indonesia. */
    const CARRIER_NAME_JNE_IDN = 'JNE_IDN';

    /** Jam Express. */
    const CARRIER_NAME_JAMEXPRESS_PH = 'JAMEXPRESS_PH';

    /** Japan Post. */
    const CARRIER_NAME_JAPAN_POST = 'JAPAN_POST';

    /** Japan Post. */
    const CARRIER_NAME_JP_POST = 'JP_POST';

    /** Jet Ship Malaysia. */
    const CARRIER_NAME_JETSHIP_MY = 'JETSHIP_MY';

    /** JetShip Singapore. */
    const CARRIER_NAME_JETSHIP_SG = 'JETSHIP_SG';

    /** Kerry Express Vietnam. */
    const CARRIER_NAME_KERRY_EXPRESS_VN = 'KERRY_EXPRESS_VN';

    /** Kerry Express Hong Kong. */
    const CARRIER_NAME_KERRY_EXPRESS_HK = 'KERRY_EXPRESS_HK';

    /** Kerry Express Thailand. */
    const CARRIER_NAME_KERRY_EXPRESS_TH = 'KERRY_EXPRESS_TH';

    /** Kiala. */
    const CARRIER_NAME_KIALA = 'KIALA';

    /** Korea Post. */
    const CARRIER_NAME_KOREA_POST = 'KOREA_POST';

    /** <a href="https://www.cjlogistics.com/en/network/th-th">CJ Logistics Korea</a>. */
    const CARRIER_NAME_CJ_KR = 'CJ_KR';

    /** LA Poste. */
    const CARRIER_NAME_LAPOSTE = 'LAPOSTE';

    /** LBC Express. */
    const CARRIER_NAME_LBC_PH = 'LBC_PH';

    /** Lietuvos Pastas. */
    const CARRIER_NAME_LIETUVOS_LT = 'LIETUVOS_LT';

    /** Lion Parcel. */
    const CARRIER_NAME_LION_PARCEL = 'LION_PARCEL';

    /** <a href="https://www.logisticsworldwide.com/">Logistics Worldwide Hong Kong</a>. */
    const CARRIER_NAME_LOGISTICSWORLDWIDE_HK = 'LOGISTICSWORLDWIDE_HK';

    /** <a href="https://www.logisticsworldwide.com/">Logistics Worldwide Korea</a>. */
    const CARRIER_NAME_LOGISTICSWORLDWIDE_KR = 'LOGISTICSWORLDWIDE_KR';

    /** <a href="https://www.logisticsworldwide.com/">Logistics Worldwide Malaysia</a>. */
    const CARRIER_NAME_LOGISTICSWORLDWIDE_MY = 'LOGISTICSWORLDWIDE_MY';

    /** Loomis. */
    const CARRIER_NAME_LOOMIS = 'LOOMIS';

    /** <a href="https://www.mondialrelay.fr/">Mondial Relay</a>. */
    const CARRIER_NAME_MONDIAL = 'MONDIAL';

    /** <a href="https://www.posta.hu/sending_mail/parcels_abroad/international_postal_parcel">Magyar Posta</a>. */
    const CARRIER_NAME_MAGYAR_HU = 'MAGYAR_HU';

    /** <a href="https://www.poslaju.com.my/">Pos Malaysia Berhad</a>. */
    const CARRIER_NAME_MALAYSIA_POST = 'MALAYSIA_POST';

    /** Masterlink. */
    const CARRIER_NAME_MASTERLINK = 'MASTERLINK';

    /** Mexico Aeroflash. */
    const CARRIER_NAME_AEROFLASH = 'AEROFLASH';

    /** Mexico Redpack. */
    const CARRIER_NAME_REDPACK = 'REDPACK';

    /** Mexico Senda Express. */
    const CARRIER_NAME_SENDA_MX = 'SENDA_MX';

    /** Mondial Belgium. */
    const CARRIER_NAME_MONDIAL_BE = 'MONDIAL_BE';

    /** MyHermes UK. */
    const CARRIER_NAME_MYHERMES = 'MYHERMES';

    /** <a href="https://www.nacex.es/cambiarIdioma.do?idioma=EN">Nacex Spain</a>. */
    const CARRIER_NAME_NACEX_ES = 'NACEX_ES';

    /** <a href="https://www.nationwidetransportation.com/nationwide_carrier.html">Nationwide Carrier and Logistics Services</a>. */
    const CARRIER_NAME_NATIONWIDE = 'NATIONWIDE';

    /** New Zealand Post. */
    const CARRIER_NAME_NZ_POST = 'NZ_POST';

    /** <a href="https://www.nipost.gov.ng/">Nigerian Postal Service</a>. */
    const CARRIER_NAME_NIPOST_NG = 'NIPOST_NG';

    /** Nightline UK. */
    const CARRIER_NAME_NIGHTLINE_UK = 'NIGHTLINE_UK';

    /** Ninjavan Philippines. */
    const CARRIER_NAME_NINJAVAN_PH = 'NINJAVAN_PH';

    /** Ninjavan Singapore. */
    const CARRIER_NAME_NINJAVAN_SG = 'NINJAVAN_SG';

    /** Nova Poshta International. */
    const CARRIER_NAME_NOVA_POSHTA_INT = 'NOVA_POSHTA_INT';

    /** Nova Poshta. */
    const CARRIER_NAME_NOVA_POSHTA = 'NOVA_POSHTA';

    /** <a href="https://www.oca.com.ar/">OCA Argentina</a>. */
    const CARRIER_NAME_OCA_AR = 'OCA_AR';

    /** OnTrac. */
    const CARRIER_NAME_ONTRAC = 'ONTRAC';

    /** PTT Posta. */
    const CARRIER_NAME_PTT_POST = 'PTT_POST';

    /** Pandu Logistics. */
    const CARRIER_NAME_PANDU = 'PANDU';

    /** Parcel Post Singapore. */
    const CARRIER_NAME_PARCELPOST_SG = 'PARCELPOST_SG';

    /** <a href="https://www.poczta-polska.pl/">Poczta Polska</a>. */
    const CARRIER_NAME_POCZTA_POLSKA = 'POCZTA_POLSKA';

    /** Pocztex. */
    const CARRIER_NAME_POCZTEX = 'POCZTEX';

    /** <a href="https://www.cttexpresso.pt/home/">CTT Expresso Portugal</a>. */
    const CARRIER_NAME_CTT_PT = 'CTT_PT';

    /** <a href="https://www.seur.com/pt/">Seur Portugal</a>. */
    const CARRIER_NAME_SEUR_PT = 'SEUR_PT';

    /** Pos Indonesia Domestic. */
    const CARRIER_NAME_POS_ID = 'POS_ID';

    /** Pos Indonesia International. */
    const CARRIER_NAME_POS_INT = 'POS_INT';

    /** <a href="https://www.postnl.nl/">Koninklijke PostNL</a>. */
    const CARRIER_NAME_POSTNL_INT_3_S = 'POSTNL_INT_3_S';

    /** PostNL. */
    const CARRIER_NAME_POSTNL = 'POSTNL';

    /** PostNl International. */
    const CARRIER_NAME_POSTNL_INT = 'POSTNL_INT';

    /** PostNord Logistics Denmark. */
    const CARRIER_NAME_POSTNORD_LOGISTICS_DK = 'POSTNORD_LOGISTICS_DK';

    /** PostNord Logistics Sweden. */
    const CARRIER_NAME_POSTNORD_LOGISTICS_SE = 'POSTNORD_LOGISTICS_SE';

    /** PostNord Logistics. */
    const CARRIER_NAME_POSTNORD_LOGISTICS_GLOBAL = 'POSTNORD_LOGISTICS_GLOBAL';

    /** Posta Romana. */
    const CARRIER_NAME_POSTA_RO = 'POSTA_RO';

    /** Poste Italiane. */
    const CARRIER_NAME_POSTE_ITALIANE = 'POSTE_ITALIANE';

    /** Posten Norge. */
    const CARRIER_NAME_POSTEN_NORGE = 'POSTEN_NORGE';

    /** Professional Couriers. */
    const CARRIER_NAME_PROFESSIONAL_COURIERS = 'PROFESSIONAL_COURIERS';

    /** RAF Philippines. */
    const CARRIER_NAME_RAF_PH = 'RAF_PH';

    /** RL Carriers. */
    const CARRIER_NAME_RL_US = 'RL_US';

    /** RPD2man Deliveries. */
    const CARRIER_NAME_RPD_2_MAN = 'RPD_2_MAN';

    /** RPX Indonesia. */
    const CARRIER_NAME_RPX_ID = 'RPX_ID';

    /** Red Express. */
    const CARRIER_NAME_REDEXPRESS = 'REDEXPRESS';

    /** Redur Spain. */
    const CARRIER_NAME_REDUR_ES = 'REDUR_ES';

    /** Registered Mail Italy. */
    const CARRIER_NAME_REGISTER_MAIL_IT = 'REGISTER_MAIL_IT';

    /** Relais Colis. */
    const CARRIER_NAME_RELAIS_COLIS_FR = 'RELAIS_COLIS_FR';

    /** Rocket Parcel International. */
    const CARRIER_NAME_ROCKET_PARCEL = 'ROCKET_PARCEL';

    /** SDA Italy. */
    const CARRIER_NAME_SDA_IT = 'SDA_IT';

    /** <a href="https://www.sf-express.com/us/en/">SF Express</a>. */
    const CARRIER_NAME_SF_EXPRESS = 'SF_EXPRESS';

    /** SFC Express. */
    const CARRIER_NAME_SFC_EXPRESS = 'SFC_EXPRESS';

    /** SGT Corriere Espresso. */
    const CARRIER_NAME_SGT_IT = 'SGT_IT';

    /** SRE Korea. */
    const CARRIER_NAME_SRE_KOREA = 'SRE_KOREA';

    /** Sagawa. */
    const CARRIER_NAME_SAGAWA = 'SAGAWA';

    /** Sagawa. */
    const CARRIER_NAME_SAGAWA_JP = 'SAGAWA_JP';

    /** Serbia Post. */
    const CARRIER_NAME_POST_SERBIA_CS = 'POST_SERBIA_CS';

    /** Singapore Post. */
    const CARRIER_NAME_SINGPOST = 'SINGPOST';

    /** Siodemka. */
    const CARRIER_NAME_SIODEMKA = 'SIODEMKA';

    /** <a href="https://www.skynetworldwide.com/">SkyNet Worldwide Express</a>. */
    const CARRIER_NAME_SKYNET_WORLDWIDE = 'SKYNET_WORLDWIDE';

    /** Skynet Malaysia. */
    const CARRIER_NAME_SKYNET_MY = 'SKYNET_MY';

    /** <a href="https://www.skynetworldwide.net/">SkyNet Worldwide Express Dubai, UAE</a>. */
    const CARRIER_NAME_SKYNET_UAE = 'SKYNET_UAE';

    /** <a href="https://www.skynetworldwide.com/">SkyNet Worldwide Express UK</a>. */
    const CARRIER_NAME_SKYNET_UK = 'SKYNET_UK';

    /** <a href="https://www.seur.com/es/">Seur Spain</a>. */
    const CARRIER_NAME_SEUR_ES = 'SEUR_ES';

    /** Star Track Express. */
    const CARRIER_NAME_STARTRACK_EXPRESS = 'STARTRACK_EXPRESS';

    /** Star Track. */
    const CARRIER_NAME_STARTRACK = 'STARTRACK';

    /** Swiss Post. */
    const CARRIER_NAME_SWISS_POST = 'SWISS_POST';

    /** TNT Australia. */
    const CARRIER_NAME_TNT_AU = 'TNT_AU';

    /** TNT China. */
    const CARRIER_NAME_TNT_CN = 'TNT_CN';

    /** TNT Click Italy. */
    const CARRIER_NAME_TNT_CLICK_IT = 'TNT_CLICK_IT';

    /** TNT France. */
    const CARRIER_NAME_TNT_FR = 'TNT_FR';

    /** TNT Germany. */
    const CARRIER_NAME_TNT_DE = 'TNT_DE';

    /** TNT Italy. */
    const CARRIER_NAME_TNT_IT = 'TNT_IT';

    /** TNT Japan. */
    const CARRIER_NAME_TNT_JP = 'TNT_JP';

    /** TNT Netherlands. */
    const CARRIER_NAME_TNT_NL = 'TNT_NL';

    /** TNT Poland. */
    const CARRIER_NAME_TNT_PL = 'TNT_PL';

    /** TNT Spain. */
    const CARRIER_NAME_TNT_ES = 'TNT_ES';

    /** TNT UK. */
    const CARRIER_NAME_TNT_UK = 'TNT_UK';

    /** <a href="https://tpg.ir/en/tracking">TPG International & Domestic Express</a>. */
    const CARRIER_NAME_TPG = 'TPG';

    /** Taiwan Post. */
    const CARRIER_NAME_TAIWAN_POST_TW = 'TAIWAN_POST_TW';

    /** TA-Q-BIN Parcel Hong Kong. */
    const CARRIER_NAME_TAQBIN_HK = 'TAQBIN_HK';

    /** TA-Q-BIN Parcel Malaysia. */
    const CARRIER_NAME_TAQBIN_MY = 'TAQBIN_MY';

    /** TA-Q-BIN Parcel Singapore. */
    const CARRIER_NAME_TAQBIN_SG = 'TAQBIN_SG';

    /** TaxiPost. */
    const CARRIER_NAME_TAXIPOST = 'TAXIPOST';

    /** Teliway. */
    const CARRIER_NAME_TELIWAY = 'TELIWAY';

    /** Thailand Post. */
    const CARRIER_NAME_THAILAND_POST = 'THAILAND_POST';

    /** The Courier Guy. */
    const CARRIER_NAME_THE_COURIER_GUY = 'THE_COURIER_GUY';

    /** Tiki. */
    const CARRIER_NAME_TIKI_ID = 'TIKI_ID';

    /** Toll IPEC. */
    const CARRIER_NAME_TOLL_IPEC = 'TOLL_IPEC';

    /** 2GO. */
    const CARRIER_NAME_TWO_GO = 'TWO_GO';

    /** Transmission Netherlands. */
    const CARRIER_NAME_TRANSMISSION = 'TRANSMISSION';

    /** UK Mail. */
    const CARRIER_NAME_UK_MAIL = 'UK_MAIL';

    /** UPS Mail Innovations. */
    const CARRIER_NAME_UPS_MI = 'UPS_MI';

    /** Vietnam Post. */
    const CARRIER_NAME_VIETNAM_POST = 'VIETNAM_POST';

    /** <a href="https://www.wahana.com/">Wahana Express Indonesia</a>. */
    const CARRIER_NAME_WAHANA_ID = 'WAHANA_ID';

    /** Xend Express. */
    const CARRIER_NAME_XEND_EXPRESS_PH = 'XEND_EXPRESS_PH';

    /** Xpress Bees. */
    const CARRIER_NAME_XPRESSBEES = 'XPRESSBEES';

    /** Yamato Japan. */
    const CARRIER_NAME_YAMATO = 'YAMATO';

    /** Yanwen China. */
    const CARRIER_NAME_YANWEN_CN = 'YANWEN_CN';

    /** Yodel. */
    const CARRIER_NAME_YODEL = 'YODEL';

    /** UPS Canada. */
    const CARRIER_NAME_UPS_CANADA = 'UPS_CANADA';

    /** UPS Mail Innovations. */
    const CARRIER_NAME_UPS_MAIL_INNOVATIONS = 'UPS_MAIL_INNOVATIONS';

    /** Deltec Germany. */
    const CARRIER_NAME_DE_DELTEC = 'DE_DELTEC';

    /** International Seur Germany. */
    const CARRIER_NAME_DE_INTERNATIONALSEUR = 'DE_INTERNATIONALSEUR';

    /** DPD France. */
    const CARRIER_NAME_FR_DPD = 'FR_DPD';

    /** IMX France. */
    const CARRIER_NAME_FR_IMX = 'FR_IMX';

    /** IMX Italy. */
    const CARRIER_NAME_IT_IMX = 'IT_IMX';

    /** DTDC Australia. */
    const CARRIER_NAME_AU_DTDC = 'AU_DTDC';

    /** Sendle Australia. */
    const CARRIER_NAME_AU_SENDLE = 'AU_SENDLE';

    /** Skynet Australia. */
    const CARRIER_NAME_AU_SKYNET = 'AU_SKYNET';

    /** <a href="https://gls-group.eu/">General Logistics Systems (GLS) Spain</a>. */
    const CARRIER_NAME_ES_GLS = 'ES_GLS';

    /** <a href="https://www.seur.com/es/">Seur International Spain</a>. */
    const CARRIER_NAME_ES_INTERNATIONALSEUR = 'ES_INTERNATIONALSEUR';

    /** IMX Spain. */
    const CARRIER_NAME_ES_IMX = 'ES_IMX';

    /** Huahan Express China. */
    const CARRIER_NAME_CN_HUAHANEXPRESS = 'CN_HUAHANEXPRESS';

    /** Local Pickup. */
    const CARRIER_NAME_LOCAL_PICKUP = 'LOCAL_PICKUP';

    /** <a href="https://dpex.com/">DPEX Worldwide Hong Kong</a>. */
    const CARRIER_NAME_HK_DPEX = 'HK_DPEX';

    /** Kerry Express Hong Kong. */
    const CARRIER_NAME_HK_KERRYEXPRESS = 'HK_KERRYEXPRESS';

    /** Logistics Worldwide Express Hong Kong. */
    const CARRIER_NAME_HK_LOGISTICSWORLDWIDEEXPRESS = 'HK_LOGISTICSWORLDWIDEEXPRESS';

    /** RPX Hong Kong. */
    const CARRIER_NAME_HK_RPX = 'HK_RPX';

    /** Spreadel Hong Kong. */
    const CARRIER_NAME_HK_SPREADEL = 'HK_SPREADEL';

    /** Spreadel IN. */
    const CARRIER_NAME_IN_SPREADEL = 'IN_SPREADEL';

    /** CJ Thailand. */
    const CARRIER_NAME_TH_CJ = 'TH_CJ';

    /** <a href="https://www.logisticsworldwide.com/">Logistics Worldwide Korea</a>. */
    const CARRIER_NAME_KR_LOGISTICSWORLDWIDE = 'KR_LOGISTICSWORLDWIDE';

    /** DHL Austria. */
    const CARRIER_NAME_AT_DHL = 'AT_DHL';

    /** IMX Belgium. */
    const CARRIER_NAME_BE_IMX = 'BE_IMX';

    /** <a href="https://www.logisticsworldwide.com/">Logistics Worldwide Malaysia</a>. */
    const CARRIER_NAME_MY_LOGISTICSWORLDWIDE = 'MY_LOGISTICSWORLDWIDE';

    /** Jetship Malaysia. */
    const CARRIER_NAME_MY_JETSHIP = 'MY_JETSHIP';

    /** DHL Singapore. */
    const CARRIER_NAME_SG_DHL = 'SG_DHL';

    /** Spreadel Singapore. */
    const CARRIER_NAME_SG_SPREADEL = 'SG_SPREADEL';

    /** <a href="https://www.posta-romana.ro/en">Romanian Post</a>. */
    const CARRIER_NAME_POSTAROMANA = 'POSTAROMANA';

    /** <a href="https://www.purolator.com/en/ship-track/shipping-services/delivery-services/us-delivery-services.page">Purolator US</a>. */
    const CARRIER_NAME_US_PUROLATOR = 'US_PUROLATOR';

    /** Fastway US. */
    const CARRIER_NAME_US_FASTWAY = 'US_FASTWAY';

    /** <a href="https://www.chronopost.fr/en#/step-home">Chronopost</a>. */
    const CARRIER_NAME_CHRONOPOST = 'CHRONOPOST';

    /** <a href="https://www.correos.es/ss/Satellite/site/pagina-inicio/info">Correos de Espana</a>. */
    const CARRIER_NAME_CORREOS_DE_ESPANA = 'CORREOS_DE_ESPANA';

    /** <a href="https://www.deutschepost.de/en/home.html">Deutsche Post DHL</a>. */
    const CARRIER_NAME_DEUTSCHE_POST_DHL = 'DEUTSCHE_POST_DHL';

    /** <a href="https://www.sda.it/SITO_SDA-INSIDEX-WEB/pages/Home_it/119">Posteitaliane</a>. */
    const CARRIER_NAME_EBOOST_SDA = 'EBOOST_SDA';

    /** Hong Kong Post. */
    const CARRIER_NAME_HONGKONG_POST = 'HONGKONG_POST';

    /** Intangible Digital Services. */
    const CARRIER_NAME_INTANGIBLE_DIGITAL_SERVICES = 'INTANGIBLE_DIGITAL_SERVICES';

    /** <a href="https://www.laposte.fr/particulier">La Poste</a>. */
    const CARRIER_NAME_LA_POSTE = 'LA_POSTE';

    /** <a href="https://www.csuivi.courrier.laposte.fr/suivi">La Poste Suivi</a>. */
    const CARRIER_NAME_LA_POSTE_SUIVI = 'LA_POSTE_SUIVI';

    /** <a href="https://www.kuronekoyamato.co.jp/en/">Yamato Transport Co.</a>. */
    const CARRIER_NAME_NEKO_YAMATO_UNYUU = 'NEKO_YAMATO_UNYUU';

    /** <a href="https://www.nittsu.com/epelicangen2/secure/login.aspx">Nippon Express</a>. */
    const CARRIER_NAME_NITTSU_PELICAN_BIN = 'NITTSU_PELICAN_BIN';

    /** <a href="https://www.poste.it/">Posteitaliane</a>. */
    const CARRIER_NAME_POSTE_ITALIA = 'POSTE_ITALIA';

    /** <a href="https://www.sagawa-exp.co.jp/english/service/standard/service04.html">Sagawa Express Co.</a>. */
    const CARRIER_NAME_SAGAWA_KYUU_BIN = 'SAGAWA_KYUU_BIN';

    /** <a href="https://startrack.com.au/services/receiving/track-and-trace">Star Track Express</a>. */
    const CARRIER_NAME_STAR_TRACK_EXPRESS = 'STAR_TRACK_EXPRESS';

    /** DTDC US. */
    const CARRIER_NAME_US_DTDC = 'US_DTDC';

    /** Star Track US. */
    const CARRIER_NAME_US_STARTRACK = 'US_STARTRACK';

    /** <a href="https://www.israelpost.co.il/">Israel Post</a>. */
    const CARRIER_NAME_ISR_ISRAEL_POST = 'ISR_ISRAEL_POST';

    /** Mondial Belgium. */
    const CARRIER_NAME_BE_MONDIAL = 'BE_MONDIAL';

    /** <a href="https://www.b2ceurope.eu/">B2C Europe</a>. */
    const CARRIER_NAME_B_2_CEUROPE = 'B_2_CEUROPE';

    /** 2GO Shipping Philippines. */
    const CARRIER_NAME_PHL_2_GO = 'PHL_2_GO';

    /** Air 21 Philippines. */
    const CARRIER_NAME_PHL_AIR_21 = 'PHL_AIR_21';

    /** <a href="https://www.seur.com/en/">Internationational Seur Spanish Portugal</a>. */
    const CARRIER_NAME_PT_SPANISH_SEUR = 'PT_SPANISH_SEUR';

    /** <a href="https://www.seur.com/es/">Seur Spain</a>. */
    const CARRIER_NAME_ES_SPANISH_SEUR = 'ES_SPANISH_SEUR';

    /** <a href="https://dpex.com/">DPEX Worldwide Singapore</a>. */
    const CARRIER_NAME_SG_DPEX = 'SG_DPEX';

    /** IMX Switzerland. */
    const CARRIER_NAME_CH_IMX = 'CH_IMX';

    /** DHLG. */
    const CARRIER_NAME_DHLG = 'DHLG';

    /**
     * The name of the shipment carrier for the transaction for this dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see CARRIER_NAME_UPS
     * @see CARRIER_NAME_USPS
     * @see CARRIER_NAME_FEDEX
     * @see CARRIER_NAME_AIRBORNE_EXPRESS
     * @see CARRIER_NAME_DHL
     * @see CARRIER_NAME_AIRSURE
     * @see CARRIER_NAME_ROYAL_MAIL
     * @see CARRIER_NAME_PARCELFORCE
     * @see CARRIER_NAME_SWIFTAIR
     * @see CARRIER_NAME_OTHER
     * @see CARRIER_NAME_UK_PARCELFORCE
     * @see CARRIER_NAME_UK_ROYALMAIL_SPECIAL
     * @see CARRIER_NAME_UK_ROYALMAIL_RECORDED
     * @see CARRIER_NAME_UK_ROYALMAIL_INT_SIGNED
     * @see CARRIER_NAME_UK_ROYALMAIL_AIRSURE
     * @see CARRIER_NAME_UK_UPS
     * @see CARRIER_NAME_UK_FEDEX
     * @see CARRIER_NAME_UK_AIRBORNE_EXPRESS
     * @see CARRIER_NAME_UK_DHL
     * @see CARRIER_NAME_UK_OTHER
     * @see CARRIER_NAME_UK_CANNOT_PROV_TRACK
     * @see CARRIER_NAME_UK_CANNOT_PROVIDE_TRACKING
     * @see CARRIER_NAME_CA_CANADA_POST
     * @see CARRIER_NAME_CA_PUROLATOR
     * @see CARRIER_NAME_CA_CANPAR
     * @see CARRIER_NAME_CA_LOOMIS
     * @see CARRIER_NAME_CA_TNT
     * @see CARRIER_NAME_TNT
     * @see CARRIER_NAME_CA_OTHER
     * @see CARRIER_NAME_CA_CANNOT_PROV_TRACK
     * @see CARRIER_NAME_DE_DP_DHL_WITHIN_EUROPE
     * @see CARRIER_NAME_DE_DP_DHL_T_AND_T_EXPRESS
     * @see CARRIER_NAME_DE_DHL_DP_INTL_SHIPMENTS
     * @see CARRIER_NAME_CA_CANNOT_PROVIDE_TRACKING
     * @see CARRIER_NAME_DE_GLS
     * @see CARRIER_NAME__DE_DPD_DELISTACK
     * @see CARRIER_NAME_DE_HERMES
     * @see CARRIER_NAME_DE_UPS
     * @see CARRIER_NAME_DE_FEDEX
     * @see CARRIER_NAME_DE_TNT
     * @see CARRIER_NAME_DE_OTHER
     * @see CARRIER_NAME_FR_CHRONOPOST
     * @see CARRIER_NAME_FR_COLIPOSTE
     * @see CARRIER_NAME_FR_DHL
     * @see CARRIER_NAME_FR_UPS
     * @see CARRIER_NAME_FR_FEDEX
     * @see CARRIER_NAME_FR_TNT
     * @see CARRIER_NAME_FR_GLS
     * @see CARRIER_NAME_FR_OTHER
     * @see CARRIER_NAME_IT_POSTE_ITALIA
     * @see CARRIER_NAME_IT_DHL
     * @see CARRIER_NAME_IT_UPS
     * @see CARRIER_NAME_IT_FEDEX
     * @see CARRIER_NAME_IT_TNT
     * @see CARRIER_NAME_IT_GLS
     * @see CARRIER_NAME_IT_OTHER
     * @see CARRIER_NAME_AU_AUSTRALIA_POST_EP_PLAT
     * @see CARRIER_NAME_AU_AUSTRALIA_POST_EPARCEL
     * @see CARRIER_NAME_AU_AUSTRALIA_POST_EMS
     * @see CARRIER_NAME_AU_DHL
     * @see CARRIER_NAME_AU_STAR_TRACK_EXPRESS
     * @see CARRIER_NAME_AU_UPS
     * @see CARRIER_NAME_AU_FEDEX
     * @see CARRIER_NAME_AU_TNT
     * @see CARRIER_NAME_AU_TOLL_IPEC
     * @see CARRIER_NAME_AU_OTHER
     * @see CARRIER_NAME_FR_SUIVI
     * @see CARRIER_NAME_IT_EBOOST_SDA
     * @see CARRIER_NAME_ES_CORREOS_DE_ESPANA
     * @see CARRIER_NAME_ES_DHL
     * @see CARRIER_NAME_ES_UPS
     * @see CARRIER_NAME_ES_FEDEX
     * @see CARRIER_NAME_ES_TNT
     * @see CARRIER_NAME_ES_OTHER
     * @see CARRIER_NAME_AT_AUSTRIAN_POST_EMS
     * @see CARRIER_NAME_AT_AUSTRIAN_POST_PPRIME
     * @see CARRIER_NAME_BE_CHRONOPOST
     * @see CARRIER_NAME_BE_TAXIPOST
     * @see CARRIER_NAME_CH_SWISS_POST_EXPRES
     * @see CARRIER_NAME_CH_SWISS_POST_PRIORITY
     * @see CARRIER_NAME_CN_CHINA_POST
     * @see CARRIER_NAME_HK_HONGKONG_POST
     * @see CARRIER_NAME_IE_AN_POST_SDS_EMS
     * @see CARRIER_NAME_IE_AN_POST_SDS_PRIORITY
     * @see CARRIER_NAME_IE_AN_POST_REGISTERED
     * @see CARRIER_NAME_IE_AN_POST_SWIFTPOST
     * @see CARRIER_NAME_IN_INDIAPOST
     * @see CARRIER_NAME_JP_JAPANPOST
     * @see CARRIER_NAME_KR_KOREA_POST
     * @see CARRIER_NAME_NL_TPG
     * @see CARRIER_NAME_SG_SINGPOST
     * @see CARRIER_NAME_TW_CHUNGHWA_POST
     * @see CARRIER_NAME_CN_CHINA_POST_EMS
     * @see CARRIER_NAME_CN_FEDEX
     * @see CARRIER_NAME_CN_TNT
     * @see CARRIER_NAME_CN_UPS
     * @see CARRIER_NAME_CN_OTHER
     * @see CARRIER_NAME_NL_TNT
     * @see CARRIER_NAME_NL_DHL
     * @see CARRIER_NAME_NL_UPS
     * @see CARRIER_NAME_NL_FEDEX
     * @see CARRIER_NAME_NL_KIALA
     * @see CARRIER_NAME_BE_KIALA
     * @see CARRIER_NAME_PL_POCZTA_POLSKA
     * @see CARRIER_NAME_PL_POCZTEX
     * @see CARRIER_NAME_PL_GLS
     * @see CARRIER_NAME_PL_MASTERLINK
     * @see CARRIER_NAME_PL_TNT
     * @see CARRIER_NAME_PL_DHL
     * @see CARRIER_NAME_PL_UPS
     * @see CARRIER_NAME_PL_FEDEX
     * @see CARRIER_NAME_JP_SAGAWA_KYUU_BIN
     * @see CARRIER_NAME_JP_NITTSU_PELICAN_BIN
     * @see CARRIER_NAME_JP_KURO_NEKO_YAMATO_UNYUU
     * @see CARRIER_NAME_JP_TNT
     * @see CARRIER_NAME_JP_DHL
     * @see CARRIER_NAME_JP_UPS
     * @see CARRIER_NAME_JP_FEDEX
     * @see CARRIER_NAME_NL_PICKUP
     * @see CARRIER_NAME_NL_INTANGIBLE
     * @see CARRIER_NAME_NL_ABC_MAIL
     * @see CARRIER_NAME_HK_FOUR_PX_EXPRESS
     * @see CARRIER_NAME_HK_FLYT_EXPRESS
     * @see CARRIER_NAME_US_ASCENDIA
     * @see CARRIER_NAME_US_ENSENDA
     * @see CARRIER_NAME_US_GLOBEGISTICS
     * @see CARRIER_NAME_US_ONTRAC
     * @see CARRIER_NAME_RRDONNELLEY
     * @see CARRIER_NAME_ASENDIA_UK
     * @see CARRIER_NAME_UK_COLLECTPLUS
     * @see CARRIER_NAME_UK_DPD
     * @see CARRIER_NAME_UK_HERMESWORLD
     * @see CARRIER_NAME_UK_INTERLINK_EXPRESS
     * @see CARRIER_NAME_UK_TNT
     * @see CARRIER_NAME_UK_UK_MAIL
     * @see CARRIER_NAME_UK_YODEL
     * @see CARRIER_NAME_BUYLOGIC
     * @see CARRIER_NAME_CN_EMS
     * @see CARRIER_NAME_CHINA_POST
     * @see CARRIER_NAME_CNEXPS
     * @see CARRIER_NAME_CPACKET
     * @see CARRIER_NAME_CUCKOOEXPRESS
     * @see CARRIER_NAME_CN_EC
     * @see CARRIER_NAME_CN_EMPS
     * @see CARRIER_NAME_DE_ASENDIA
     * @see CARRIER_NAME_UK_DELTEC
     * @see CARRIER_NAME_DE_DEUTSCHE
     * @see CARRIER_NAME_DE_DPD
     * @see CARRIER_NAME_RABEN_GROUP
     * @see CARRIER_NAME_GLOBAL_TNT
     * @see CARRIER_NAME_ADSONE
     * @see CARRIER_NAME_AU_AU_POST
     * @see CARRIER_NAME_BONDSCOURIERS
     * @see CARRIER_NAME_COURIERS_PLEASE
     * @see CARRIER_NAME_DTDC_AU
     * @see CARRIER_NAME_AU_FASTWAY
     * @see CARRIER_NAME_HUNTER_EXPRESS
     * @see CARRIER_NAME_SENDLE
     * @see CARRIER_NAME_AUS_TOLL
     * @see CARRIER_NAME_TOLL
     * @see CARRIER_NAME_UBI_LOGISTICS
     * @see CARRIER_NAME_OMNIPARCEL
     * @see CARRIER_NAME_QUANTIUM
     * @see CARRIER_NAME_CN_SF_EXPRESS
     * @see CARRIER_NAME_SEKOLOGISTICS
     * @see CARRIER_NAME_HK_TAQBIN
     * @see CARRIER_NAME_GB_APC
     * @see CARRIER_NAME_CA_CANPAR_COURIER
     * @see CARRIER_NAME_GLOBAL_ESTES
     * @see CARRIER_NAME_CA_GREYHOUND
     * @see CARRIER_NAME_PUROLATOR
     * @see CARRIER_NAME_US_RL
     * @see CARRIER_NAME_IT_BRT
     * @see CARRIER_NAME_DMM_NETWORK
     * @see CARRIER_NAME_IT_FERCAM
     * @see CARRIER_NAME_HERMES_IT
     * @see CARRIER_NAME_IT_POSTE_ITALIANE
     * @see CARRIER_NAME_IT_SDA
     * @see CARRIER_NAME_IT_SGT
     * @see CARRIER_NAME_GLOBAL_SKYNET
     * @see CARRIER_NAME_FR_BERT
     * @see CARRIER_NAME_FR_COLIS
     * @see CARRIER_NAME_FR_GEODIS
     * @see CARRIER_NAME_FR_LAPOSTE
     * @see CARRIER_NAME_FR_TELIWAY
     * @see CARRIER_NAME_DPD_POLAND
     * @see CARRIER_NAME_INPOST_PACZKOMATY
     * @see CARRIER_NAME_POL_POCZTA
     * @see CARRIER_NAME_POL_SIODEMKA
     * @see CARRIER_NAME_ESP_CORREOS
     * @see CARRIER_NAME_ES_CORREOS
     * @see CARRIER_NAME_ESP_NACEX
     * @see CARRIER_NAME_ESP_ASM
     * @see CARRIER_NAME_ESP_REDUR
     * @see CARRIER_NAME_CBL_LOGISTICA
     * @see CARRIER_NAME_EKART
     * @see CARRIER_NAME_IND_DELHIVERY
     * @see CARRIER_NAME_IND_BLUEDART
     * @see CARRIER_NAME_IND_DTDC
     * @see CARRIER_NAME_IND_PROFESSIONAL_COURIERS
     * @see CARRIER_NAME_IND_REDEXPRESS
     * @see CARRIER_NAME_IND_XPRESSBEES
     * @see CARRIER_NAME_IND_DOTZOT
     * @see CARRIER_NAME_THA_KERRY
     * @see CARRIER_NAME_SENDIT
     * @see CARRIER_NAME_ACOMMERCE
     * @see CARRIER_NAME_NINJAVAN_THAI
     * @see CARRIER_NAME_NIM_EXPRESS
     * @see CARRIER_NAME_THA_THAILAND_POST
     * @see CARRIER_NAME_THA_DYNAMIC_LOGISTICS
     * @see CARRIER_NAME_ALPHAFAST
     * @see CARRIER_NAME_FASTRAK_TH
     * @see CARRIER_NAME_EPARCEL_KR
     * @see CARRIER_NAME_CJ_KOREA_THAI
     * @see CARRIER_NAME_RINCOS
     * @see CARRIER_NAME_KOR_KOREA_POST
     * @see CARRIER_NAME_KOR_CJ
     * @see CARRIER_NAME_KOR_ECARGO
     * @see CARRIER_NAME_SREKOREA
     * @see CARRIER_NAME_ROCKETPARCEL
     * @see CARRIER_NAME_BG_BULGARIAN_POST
     * @see CARRIER_NAME_JPN_JAPAN_POST
     * @see CARRIER_NAME_JPN_YAMATO
     * @see CARRIER_NAME_JPN_SAGAWA
     * @see CARRIER_NAME_TUR_PTT
     * @see CARRIER_NAME_AUT_AUSTRIAN_POST
     * @see CARRIER_NAME_AU_AUSTRIAN_POST
     * @see CARRIER_NAME_RUSSIAN_POST
     * @see CARRIER_NAME_BEL_DHL
     * @see CARRIER_NAME_FR_MONDIAL
     * @see CARRIER_NAME_EU_BPOST
     * @see CARRIER_NAME_LANDMARK_GLOBAL
     * @see CARRIER_NAME_IDN_POS
     * @see CARRIER_NAME_IDN_POS_INT
     * @see CARRIER_NAME_IDN_JNE
     * @see CARRIER_NAME_IDN_PANDU
     * @see CARRIER_NAME_RPX
     * @see CARRIER_NAME_IDN_TIKI
     * @see CARRIER_NAME_IDN_LION_PARCEL
     * @see CARRIER_NAME_NINJAVAN_ID
     * @see CARRIER_NAME_IDN_WAHANA
     * @see CARRIER_NAME_IDN_FIRST_LOGISTICS
     * @see CARRIER_NAME_UK_AN_POST
     * @see CARRIER_NAME_DPD
     * @see CARRIER_NAME_UK_FASTWAY
     * @see CARRIER_NAME_UK_NIGHTLINE
     * @see CARRIER_NAME_WISELOADS
     * @see CARRIER_NAME_GR_ELTA
     * @see CARRIER_NAME_GRC_ACS
     * @see CARRIER_NAME_GR_GENIKI
     * @see CARRIER_NAME_NINJAVAN_PHILIPPINES
     * @see CARRIER_NAME_PHL_XEND_EXPRESS
     * @see CARRIER_NAME_PHL_LBC
     * @see CARRIER_NAME_PHL_JAMEXPRESS
     * @see CARRIER_NAME_PHL_AIRSPEED
     * @see CARRIER_NAME_PHL_RAF
     * @see CARRIER_NAME_DIRECTLOG
     * @see CARRIER_NAME_BRA_CORREIOS
     * @see CARRIER_NAME_NLD_DHL
     * @see CARRIER_NAME_NLD_POSTNL
     * @see CARRIER_NAME_NLD_GLS
     * @see CARRIER_NAME_NLD_TRANSMISSION
     * @see CARRIER_NAME_CORREOS_DE_MEXICO
     * @see CARRIER_NAME_MEX_ESTAFETA
     * @see CARRIER_NAME_MEX_SENDA
     * @see CARRIER_NAME_MEX_REDPACK
     * @see CARRIER_NAME_MEX_AEROFLASH
     * @see CARRIER_NAME_NATIONWIDE_MY
     * @see CARRIER_NAME_MYS_MYS_POST
     * @see CARRIER_NAME_MYS_TAQBIN
     * @see CARRIER_NAME_MYS_SKYNET
     * @see CARRIER_NAME_MYS_CITYLINK
     * @see CARRIER_NAME_MYS_AIRPAK
     * @see CARRIER_NAME_NINJAVAN_MY
     * @see CARRIER_NAME_KANGAROO_MY
     * @see CARRIER_NAME_VNM_VIETNAM_POST
     * @see CARRIER_NAME_VNPOST_EMS
     * @see CARRIER_NAME_PRT_INT_SEUR
     * @see CARRIER_NAME_PRT_CTT
     * @see CARRIER_NAME_PRT_CHRONOPOST
     * @see CARRIER_NAME_PRT_SEUR
     * @see CARRIER_NAME_ADICIONAL
     * @see CARRIER_NAME_LTU_LIETUVOS
     * @see CARRIER_NAME_DPEX
     * @see CARRIER_NAME_LWE_HK
     * @see CARRIER_NAME_SG_SG_POST
     * @see CARRIER_NAME_SG_TAQBIN
     * @see CARRIER_NAME_SG_NINJAVAN
     * @see CARRIER_NAME_SG_ZALORA
     * @see CARRIER_NAME_JET_SHIP
     * @see CARRIER_NAME_SG_PARCELPOST
     * @see CARRIER_NAME_CHE_SWISS_POST
     * @see CARRIER_NAME_ASENDIA_HK
     * @see CARRIER_NAME_HUN_MAGYAR
     * @see CARRIER_NAME_POSTNORD_LOGISTICS
     * @see CARRIER_NAME_SWE_DIRECTLINK
     * @see CARRIER_NAME_SWE_POSTNORD
     * @see CARRIER_NAME_SWE_DB
     * @see CARRIER_NAME_CZE_CESKA
     * @see CARRIER_NAME_NZ_NZ_POST
     * @see CARRIER_NAME_NZ_COURIER_POST
     * @see CARRIER_NAME_FASTWAY_NZ
     * @see CARRIER_NAME_TW_TAIWAN_POST
     * @see CARRIER_NAME_SPREADEL
     * @see CARRIER_NAME_ARE_EMIRATES_POST
     * @see CARRIER_NAME_AXL
     * @see CARRIER_NAME_CYP_CYPRUS_POST
     * @see CARRIER_NAME_HRV_HRVATSKA
     * @see CARRIER_NAME_NOR_POSTEN
     * @see CARRIER_NAME_RAM
     * @see CARRIER_NAME_THECOURIERGUY
     * @see CARRIER_NAME_ZA_FASTWAY
     * @see CARRIER_NAME_DPE_EXPRESS
     * @see CARRIER_NAME_POSTI
     * @see CARRIER_NAME_MATKAHUOLTO
     * @see CARRIER_NAME_GLOBAL_DHL
     * @see CARRIER_NAME_ARG_CORREO
     * @see CARRIER_NAME_ARG_OCA
     * @see CARRIER_NAME_POST_SERBIA
     * @see CARRIER_NAME_BH_POSTA
     * @see CARRIER_NAME_CORREOS_CHILE
     * @see CARRIER_NAME_APR_72
     * @see CARRIER_NAME_CORREOS_DE_COSTA_RICA
     * @see CARRIER_NAME_POSTUR_IS
     * @see CARRIER_NAME_SPEEDEXCOURIER
     * @see CARRIER_NAME_ROU_POSTA
     * @see CARRIER_NAME_UKR_NOVA
     * @see CARRIER_NAME_UKR_POSHTA
     * @see CARRIER_NAME_NGA_NIPOST
     * @see CARRIER_NAME_NG_COURIERPLUS
     * @see CARRIER_NAME_ESHOPWORLD
     * @see CARRIER_NAME_WEBINTERPRET
     * @see CARRIER_NAME_HERMES
     * @see CARRIER_NAME_ABC_MAIL
     * @see CARRIER_NAME_ARAMEX
     * @see CARRIER_NAME_YANWEN
     * @see CARRIER_NAME_INTERNATIONAL_BRIDGE
     * @see CARRIER_NAME_SFC_LOGISTICS
     * @see CARRIER_NAME_BQC_EXPRESS
     * @see CARRIER_NAME_ONE_WORLD
     * @see CARRIER_NAME_IT_REGISTER_MAIL
     * @see CARRIER_NAME_WINIT
     * @see CARRIER_NAME_CONTINENTAL
     * @see CARRIER_NAME_EFS
     * @see CARRIER_NAME_PANTOS
     * @see CARRIER_NAME_RELAIS_COLIS
     * @see CARRIER_NAME_US_DHL_EXPRESS
     * @see CARRIER_NAME_US_DHL_PARCEL
     * @see CARRIER_NAME_US_DHL_ECOMMERCE
     * @see CARRIER_NAME_US_DHL_GLOBALFORWARDING
     * @see CARRIER_NAME_UK_DHL_EXPRESS
     * @see CARRIER_NAME_UK_DHL_PARCEL
     * @see CARRIER_NAME_UK_DHL_GLOBALFORWARDING
     * @see CARRIER_NAME_CN_DHL_EXPRESS
     * @see CARRIER_NAME_CN_DHL_ECOMMERCE
     * @see CARRIER_NAME_CN_DHL_GLOBALFORWARDING
     * @see CARRIER_NAME_DE_DHL_EXPRESS
     * @see CARRIER_NAME_DE_DHL_PARCEL
     * @see CARRIER_NAME_DE_DHL_PACKET
     * @see CARRIER_NAME_DE_DHL_ECOMMERCE
     * @see CARRIER_NAME_DE_DHL_GLOBALFORWARDING
     * @see CARRIER_NAME_DE_DHL_DEUTSCHEPOST
     * @see CARRIER_NAME_AU_DHL_EXPRESS
     * @see CARRIER_NAME_AU_DHL_ECOMMERCE
     * @see CARRIER_NAME_AU_DHL_GLOBALFORWARDING
     * @see CARRIER_NAME_HK_DHL_EXPRESS
     * @see CARRIER_NAME_HK_DHL_ECOMMERCE
     * @see CARRIER_NAME_HK_DHL_GLOBALFORWARDING
     * @see CARRIER_NAME_CA_DHL_EXPRESS
     * @see CARRIER_NAME_CA_DHL_ECOMMERCE
     * @see CARRIER_NAME_CA_DHL_GLOBALFORWARDING
     * @see CARRIER_NAME_IT_DHL_EXPRESS
     * @see CARRIER_NAME_IT_DHL_ECOMMERCE
     * @see CARRIER_NAME_IT_DHL_GLOBALFORWARDING
     * @see CARRIER_NAME_FR_DHL_EXPRESS
     * @see CARRIER_NAME_FR_DHL_PARCEL
     * @see CARRIER_NAME_FR_DHL_GLOBALFORWARDING
     * @see CARRIER_NAME_PL_DHL_EXPRESS
     * @see CARRIER_NAME_PL_DHL_PARCEL
     * @see CARRIER_NAME_PL_DHL_GLOBALFORWARDING
     * @see CARRIER_NAME_ABC_PACKAGE
     * @see CARRIER_NAME_AN_POST
     * @see CARRIER_NAME_APC_OVERNIGHT
     * @see CARRIER_NAME_ASM_ES
     * @see CARRIER_NAME_AUPOST_CN
     * @see CARRIER_NAME_ACOMMMERCE
     * @see CARRIER_NAME_ADICIONAL_PT
     * @see CARRIER_NAME_AIR_21
     * @see CARRIER_NAME_AIRBORNE_EXPRESS_UK
     * @see CARRIER_NAME_AIRPAK_MY
     * @see CARRIER_NAME_AIRSPEED
     * @see CARRIER_NAME_ASENDIA_DE
     * @see CARRIER_NAME_ASENDIA_US
     * @see CARRIER_NAME_AUSTRALIA_POST
     * @see CARRIER_NAME_TOLL_AU
     * @see CARRIER_NAME_AUSTRIAN_POST_EXPRESS
     * @see CARRIER_NAME_AUSTRIAN_POST
     * @see CARRIER_NAME_B_TWO_C_EUROPE
     * @see CARRIER_NAME_BERT
     * @see CARRIER_NAME_BPOST
     * @see CARRIER_NAME_BRT_IT
     * @see CARRIER_NAME_BLUEDART
     * @see CARRIER_NAME_BONDS_COURIERS
     * @see CARRIER_NAME_BPOST_INT
     * @see CARRIER_NAME_BULGARIAN_POST
     * @see CARRIER_NAME_CJ_LOGISTICS
     * @see CARRIER_NAME_CJ_INT_MY
     * @see CARRIER_NAME_CJ_MY
     * @see CARRIER_NAME_CJ_TH
     * @see CARRIER_NAME_CANADA_POST
     * @see CARRIER_NAME_CANPAR
     * @see CARRIER_NAME_CESKA_CZ
     * @see CARRIER_NAME_CHRONOPOST_FR
     * @see CARRIER_NAME_CHRONOPOST_PT
     * @see CARRIER_NAME_CHUNGHWA_POST
     * @see CARRIER_NAME_CITYLINK_MY
     * @see CARRIER_NAME_COLIPOSTE
     * @see CARRIER_NAME_COLIS
     * @see CARRIER_NAME_COLLECTPLUS
     * @see CARRIER_NAME_CORREOS_AG
     * @see CARRIER_NAME_CORREOS_BR
     * @see CARRIER_NAME_CORREOS_CL
     * @see CARRIER_NAME_CORREOS_CR
     * @see CARRIER_NAME_CORREOS_MX
     * @see CARRIER_NAME_CORREOS_ES
     * @see CARRIER_NAME_CORREOS_EXPRESS
     * @see CARRIER_NAME_COURIERPLUS
     * @see CARRIER_NAME_COURIER_POST
     * @see CARRIER_NAME_CYPRUS_POST_CYP
     * @see CARRIER_NAME_DBSCHENKER_SE
     * @see CARRIER_NAME_DHL_ES
     * @see CARRIER_NAME_DHL_ACTIVE_TRACING
     * @see CARRIER_NAME_DHL_AU
     * @see CARRIER_NAME_DHL_BENELUX
     * @see CARRIER_NAME_DHL_DEUTSCHE_POST
     * @see CARRIER_NAME_DHL_FR
     * @see CARRIER_NAME_DHL_GLOBAL_ECOMMERCE
     * @see CARRIER_NAME_DHL_HK
     * @see CARRIER_NAME_DHL_IT
     * @see CARRIER_NAME_DHL_JP
     * @see CARRIER_NAME_DHL_NL
     * @see CARRIER_NAME_DHL_PACKET
     * @see CARRIER_NAME_DHL_PARCEL_NL
     * @see CARRIER_NAME_DHL_PARCEL_ES
     * @see CARRIER_NAME_DHL_PL
     * @see CARRIER_NAME_DHL_SG
     * @see CARRIER_NAME_DHL_UK
     * @see CARRIER_NAME_DHL_GLOBAL_MAIL_ASIA
     * @see CARRIER_NAME_DHL_GLOBAL_MAIL
     * @see CARRIER_NAME_DHL_AT
     * @see CARRIER_NAME_DPD_DELISTRACK
     * @see CARRIER_NAME_DPD_FR
     * @see CARRIER_NAME_DPD_DE
     * @see CARRIER_NAME_DPD_HK
     * @see CARRIER_NAME_DPD_IR
     * @see CARRIER_NAME_DPD_LOCAL_REF
     * @see CARRIER_NAME_DPD_LOCAL
     * @see CARRIER_NAME_DPD_PL
     * @see CARRIER_NAME_DPD_RO
     * @see CARRIER_NAME_DPD_RU
     * @see CARRIER_NAME_DPD_UK
     * @see CARRIER_NAME_DTDC_EXPRESS
     * @see CARRIER_NAME_DTDC_IN
     * @see CARRIER_NAME_DAWN_WING
     * @see CARRIER_NAME_DELHIVERY_IN
     * @see CARRIER_NAME_DELTEC_DE
     * @see CARRIER_NAME_DELTEC_UK
     * @see CARRIER_NAME_DEUTSCHE_DE
     * @see CARRIER_NAME_DIRECTLINK_SE
     * @see CARRIER_NAME_DIRECTLOG_BR
     * @see CARRIER_NAME_DOTZOT
     * @see CARRIER_NAME_EC_CN
     * @see CARRIER_NAME_ELTA_GR
     * @see CARRIER_NAME_EMPS_CN
     * @see CARRIER_NAME_EMS_CN
     * @see CARRIER_NAME_ECARGO
     * @see CARRIER_NAME_EMIRATES_POST
     * @see CARRIER_NAME_ENSENDA
     * @see CARRIER_NAME_ESTAFETA
     * @see CARRIER_NAME_ESTES
     * @see CARRIER_NAME_FERCAM_IT
     * @see CARRIER_NAME_FLYT_EXPRESS
     * @see CARRIER_NAME_FASTRACK
     * @see CARRIER_NAME_FASTWAY_US
     * @see CARRIER_NAME_FASTWAY_ZA
     * @see CARRIER_NAME_FASTWAY_UK
     * @see CARRIER_NAME_FASTWAY_AU
     * @see CARRIER_NAME_FIRST_LOGISITCS
     * @see CARRIER_NAME_FOUR_PX_EXPRESS
     * @see CARRIER_NAME_GEODIS
     * @see CARRIER_NAME_GLS_CZ
     * @see CARRIER_NAME_GLS_FR
     * @see CARRIER_NAME_GLS_DE
     * @see CARRIER_NAME_GLS_IT
     * @see CARRIER_NAME_GLS_NL
     * @see CARRIER_NAME_GLS_ES
     * @see CARRIER_NAME_GLS
     * @see CARRIER_NAME_ACS_GR
     * @see CARRIER_NAME_GENIKI_GR
     * @see CARRIER_NAME_GLOBEGISTICS
     * @see CARRIER_NAME_GREYHOUND
     * @see CARRIER_NAME_HERMES_DE
     * @see CARRIER_NAME_HERMESWORLD_UK
     * @see CARRIER_NAME_HK_POST
     * @see CARRIER_NAME_HRVATSKA_HR
     * @see CARRIER_NAME_HUAHAN_EXPRESS
     * @see CARRIER_NAME_IMX
     * @see CARRIER_NAME_ITIS
     * @see CARRIER_NAME_INDIA_POST
     * @see CARRIER_NAME_INTERLINK
     * @see CARRIER_NAME_INT_SEUR
     * @see CARRIER_NAME_INT_SUER
     * @see CARRIER_NAME_ISRAEL_POST
     * @see CARRIER_NAME_JNE_IDN
     * @see CARRIER_NAME_JAMEXPRESS_PH
     * @see CARRIER_NAME_JAPAN_POST
     * @see CARRIER_NAME_JP_POST
     * @see CARRIER_NAME_JETSHIP_MY
     * @see CARRIER_NAME_JETSHIP_SG
     * @see CARRIER_NAME_KERRY_EXPRESS_VN
     * @see CARRIER_NAME_KERRY_EXPRESS_HK
     * @see CARRIER_NAME_KERRY_EXPRESS_TH
     * @see CARRIER_NAME_KIALA
     * @see CARRIER_NAME_KOREA_POST
     * @see CARRIER_NAME_CJ_KR
     * @see CARRIER_NAME_LAPOSTE
     * @see CARRIER_NAME_LBC_PH
     * @see CARRIER_NAME_LIETUVOS_LT
     * @see CARRIER_NAME_LION_PARCEL
     * @see CARRIER_NAME_LOGISTICSWORLDWIDE_HK
     * @see CARRIER_NAME_LOGISTICSWORLDWIDE_KR
     * @see CARRIER_NAME_LOGISTICSWORLDWIDE_MY
     * @see CARRIER_NAME_LOOMIS
     * @see CARRIER_NAME_MONDIAL
     * @see CARRIER_NAME_MAGYAR_HU
     * @see CARRIER_NAME_MALAYSIA_POST
     * @see CARRIER_NAME_MASTERLINK
     * @see CARRIER_NAME_AEROFLASH
     * @see CARRIER_NAME_REDPACK
     * @see CARRIER_NAME_SENDA_MX
     * @see CARRIER_NAME_MONDIAL_BE
     * @see CARRIER_NAME_MYHERMES
     * @see CARRIER_NAME_NACEX_ES
     * @see CARRIER_NAME_NATIONWIDE
     * @see CARRIER_NAME_NZ_POST
     * @see CARRIER_NAME_NIPOST_NG
     * @see CARRIER_NAME_NIGHTLINE_UK
     * @see CARRIER_NAME_NINJAVAN_PH
     * @see CARRIER_NAME_NINJAVAN_SG
     * @see CARRIER_NAME_NOVA_POSHTA_INT
     * @see CARRIER_NAME_NOVA_POSHTA
     * @see CARRIER_NAME_OCA_AR
     * @see CARRIER_NAME_ONTRAC
     * @see CARRIER_NAME_PTT_POST
     * @see CARRIER_NAME_PANDU
     * @see CARRIER_NAME_PARCELPOST_SG
     * @see CARRIER_NAME_POCZTA_POLSKA
     * @see CARRIER_NAME_POCZTEX
     * @see CARRIER_NAME_CTT_PT
     * @see CARRIER_NAME_SEUR_PT
     * @see CARRIER_NAME_POS_ID
     * @see CARRIER_NAME_POS_INT
     * @see CARRIER_NAME_POSTNL_INT_3_S
     * @see CARRIER_NAME_POSTNL
     * @see CARRIER_NAME_POSTNL_INT
     * @see CARRIER_NAME_POSTNORD_LOGISTICS_DK
     * @see CARRIER_NAME_POSTNORD_LOGISTICS_SE
     * @see CARRIER_NAME_POSTNORD_LOGISTICS_GLOBAL
     * @see CARRIER_NAME_POSTA_RO
     * @see CARRIER_NAME_POSTE_ITALIANE
     * @see CARRIER_NAME_POSTEN_NORGE
     * @see CARRIER_NAME_PROFESSIONAL_COURIERS
     * @see CARRIER_NAME_RAF_PH
     * @see CARRIER_NAME_RL_US
     * @see CARRIER_NAME_RPD_2_MAN
     * @see CARRIER_NAME_RPX_ID
     * @see CARRIER_NAME_REDEXPRESS
     * @see CARRIER_NAME_REDUR_ES
     * @see CARRIER_NAME_REGISTER_MAIL_IT
     * @see CARRIER_NAME_RELAIS_COLIS_FR
     * @see CARRIER_NAME_ROCKET_PARCEL
     * @see CARRIER_NAME_SDA_IT
     * @see CARRIER_NAME_SF_EXPRESS
     * @see CARRIER_NAME_SFC_EXPRESS
     * @see CARRIER_NAME_SGT_IT
     * @see CARRIER_NAME_SRE_KOREA
     * @see CARRIER_NAME_SAGAWA
     * @see CARRIER_NAME_SAGAWA_JP
     * @see CARRIER_NAME_POST_SERBIA_CS
     * @see CARRIER_NAME_SINGPOST
     * @see CARRIER_NAME_SIODEMKA
     * @see CARRIER_NAME_SKYNET_WORLDWIDE
     * @see CARRIER_NAME_SKYNET_MY
     * @see CARRIER_NAME_SKYNET_UAE
     * @see CARRIER_NAME_SKYNET_UK
     * @see CARRIER_NAME_SEUR_ES
     * @see CARRIER_NAME_STARTRACK_EXPRESS
     * @see CARRIER_NAME_STARTRACK
     * @see CARRIER_NAME_SWISS_POST
     * @see CARRIER_NAME_TNT_AU
     * @see CARRIER_NAME_TNT_CN
     * @see CARRIER_NAME_TNT_CLICK_IT
     * @see CARRIER_NAME_TNT_FR
     * @see CARRIER_NAME_TNT_DE
     * @see CARRIER_NAME_TNT_IT
     * @see CARRIER_NAME_TNT_JP
     * @see CARRIER_NAME_TNT_NL
     * @see CARRIER_NAME_TNT_PL
     * @see CARRIER_NAME_TNT_ES
     * @see CARRIER_NAME_TNT_UK
     * @see CARRIER_NAME_TPG
     * @see CARRIER_NAME_TAIWAN_POST_TW
     * @see CARRIER_NAME_TAQBIN_HK
     * @see CARRIER_NAME_TAQBIN_MY
     * @see CARRIER_NAME_TAQBIN_SG
     * @see CARRIER_NAME_TAXIPOST
     * @see CARRIER_NAME_TELIWAY
     * @see CARRIER_NAME_THAILAND_POST
     * @see CARRIER_NAME_THE_COURIER_GUY
     * @see CARRIER_NAME_TIKI_ID
     * @see CARRIER_NAME_TOLL_IPEC
     * @see CARRIER_NAME_TWO_GO
     * @see CARRIER_NAME_TRANSMISSION
     * @see CARRIER_NAME_UK_MAIL
     * @see CARRIER_NAME_UPS_MI
     * @see CARRIER_NAME_VIETNAM_POST
     * @see CARRIER_NAME_WAHANA_ID
     * @see CARRIER_NAME_XEND_EXPRESS_PH
     * @see CARRIER_NAME_XPRESSBEES
     * @see CARRIER_NAME_YAMATO
     * @see CARRIER_NAME_YANWEN_CN
     * @see CARRIER_NAME_YODEL
     * @see CARRIER_NAME_UPS_CANADA
     * @see CARRIER_NAME_UPS_MAIL_INNOVATIONS
     * @see CARRIER_NAME_DE_DELTEC
     * @see CARRIER_NAME_DE_INTERNATIONALSEUR
     * @see CARRIER_NAME_FR_DPD
     * @see CARRIER_NAME_FR_IMX
     * @see CARRIER_NAME_IT_IMX
     * @see CARRIER_NAME_AU_DTDC
     * @see CARRIER_NAME_AU_SENDLE
     * @see CARRIER_NAME_AU_SKYNET
     * @see CARRIER_NAME_ES_GLS
     * @see CARRIER_NAME_ES_INTERNATIONALSEUR
     * @see CARRIER_NAME_ES_IMX
     * @see CARRIER_NAME_CN_HUAHANEXPRESS
     * @see CARRIER_NAME_LOCAL_PICKUP
     * @see CARRIER_NAME_HK_DPEX
     * @see CARRIER_NAME_HK_KERRYEXPRESS
     * @see CARRIER_NAME_HK_LOGISTICSWORLDWIDEEXPRESS
     * @see CARRIER_NAME_HK_RPX
     * @see CARRIER_NAME_HK_SPREADEL
     * @see CARRIER_NAME_IN_SPREADEL
     * @see CARRIER_NAME_TH_CJ
     * @see CARRIER_NAME_KR_LOGISTICSWORLDWIDE
     * @see CARRIER_NAME_AT_DHL
     * @see CARRIER_NAME_BE_IMX
     * @see CARRIER_NAME_MY_LOGISTICSWORLDWIDE
     * @see CARRIER_NAME_MY_JETSHIP
     * @see CARRIER_NAME_SG_DHL
     * @see CARRIER_NAME_SG_SPREADEL
     * @see CARRIER_NAME_POSTAROMANA
     * @see CARRIER_NAME_US_PUROLATOR
     * @see CARRIER_NAME_US_FASTWAY
     * @see CARRIER_NAME_CHRONOPOST
     * @see CARRIER_NAME_CORREOS_DE_ESPANA
     * @see CARRIER_NAME_DEUTSCHE_POST_DHL
     * @see CARRIER_NAME_EBOOST_SDA
     * @see CARRIER_NAME_HONGKONG_POST
     * @see CARRIER_NAME_INTANGIBLE_DIGITAL_SERVICES
     * @see CARRIER_NAME_LA_POSTE
     * @see CARRIER_NAME_LA_POSTE_SUIVI
     * @see CARRIER_NAME_NEKO_YAMATO_UNYUU
     * @see CARRIER_NAME_NITTSU_PELICAN_BIN
     * @see CARRIER_NAME_POSTE_ITALIA
     * @see CARRIER_NAME_SAGAWA_KYUU_BIN
     * @see CARRIER_NAME_STAR_TRACK_EXPRESS
     * @see CARRIER_NAME_US_DTDC
     * @see CARRIER_NAME_US_STARTRACK
     * @see CARRIER_NAME_ISR_ISRAEL_POST
     * @see CARRIER_NAME_BE_MONDIAL
     * @see CARRIER_NAME_B_2_CEUROPE
     * @see CARRIER_NAME_PHL_2_GO
     * @see CARRIER_NAME_PHL_AIR_21
     * @see CARRIER_NAME_PT_SPANISH_SEUR
     * @see CARRIER_NAME_ES_SPANISH_SEUR
     * @see CARRIER_NAME_SG_DPEX
     * @see CARRIER_NAME_CH_IMX
     * @see CARRIER_NAME_DHLG
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $carrier_name;

    /**
     * The name of carrier in free-form text for unavailable carriers. This field is mandatory when
     * <code>carrier_name</code> is <code>OTHER</code>.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $carrier_name_other;

    /**
     * The URL to track the dispute-related transaction shipment.
     *
     * @var string | null
     */
    public $tracking_url;

    /**
     * The number to track the dispute-related transaction shipment.
     *
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $tracking_number;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->carrier_name, "carrier_name in ResponseTrackingInfo must not be NULL $within");
        Assert::minLength(
            $this->carrier_name,
            1,
            "carrier_name in ResponseTrackingInfo must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->carrier_name,
            255,
            "carrier_name in ResponseTrackingInfo must have maxlength of 255 $within"
        );
        !isset($this->carrier_name_other) || Assert::minLength(
            $this->carrier_name_other,
            1,
            "carrier_name_other in ResponseTrackingInfo must have minlength of 1 $within"
        );
        !isset($this->carrier_name_other) || Assert::maxLength(
            $this->carrier_name_other,
            2000,
            "carrier_name_other in ResponseTrackingInfo must have maxlength of 2000 $within"
        );
        Assert::notNull($this->tracking_number, "tracking_number in ResponseTrackingInfo must not be NULL $within");
        Assert::minLength(
            $this->tracking_number,
            1,
            "tracking_number in ResponseTrackingInfo must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->tracking_number,
            255,
            "tracking_number in ResponseTrackingInfo must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['carrier_name'])) {
            $this->carrier_name = $data['carrier_name'];
        }
        if (isset($data['carrier_name_other'])) {
            $this->carrier_name_other = $data['carrier_name_other'];
        }
        if (isset($data['tracking_url'])) {
            $this->tracking_url = $data['tracking_url'];
        }
        if (isset($data['tracking_number'])) {
            $this->tracking_number = $data['tracking_number'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
