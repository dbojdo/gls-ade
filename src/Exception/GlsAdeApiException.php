<?php
/**
 * File: Error.php
 * Created at: 2014-11-21 20:28
 */
 
namespace Webit\GlsAde\Model;

/**
 * Class Error
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
interface GleAdeApiException
{
    const ERROR_USER_INSUFFICIENT_PERMISSIONS = 'err_user_insufficient_permissions';
    const ERROR_SESSION_EXPIRED = 'err_sess_expired';
    const ERROR_SESSION_NOT_FOUND = 'err_sess_not_found';
    const ERROR_SESSION_CREATE_PROBLEM = 'err_sess_create_problem';
    const ERROR_USER_WEBAPI_BLOCKED = 'err_user_webapi_blocked';
    const ERROR_USER_PERMISSIONS_PROBLEM = 'err_user_permissions_problem';
    const ERROR_USER_INCORRECT_USERNAME_PASSWORD = 'err_user_incorrect_username_password';
    const ERROR_USER_INVALID_RIGHT = 'err_user_invalid_right';


    const ERROR_ZIP_CODE_NOT_FOUND = 'err_zipcode_not_found';

    /** Waga przesyłki nie jest liczbą. */
    const ERROR_CONSIGNMENT_WEIGHT_IS_NOT_A_NUMBER = 'err_cons_weight_is_not_a_number';

    /** Waga przesyłki jest mniejsza niż zero. Waga pojedynczej paczki nie może być mniejsza od 0,01kg (10g). */
    const ERROR_CONSIGNMENT_WEIGHT_IS_LESS_THAN_ZERO = 'err_cons_weight_is_less_than_zero';

    /** Waga paczki jest za duża. Informacje o wagach maksymalnych dostępne są metodą adeParcel_GetMaxWeights. */
    const ERROR_CONSIGNMENT_WEIGHT_IS_TOO_LARGE = 'err_cons_weight_of_parcel_is_to_large';

    /** Liczba paczek w przesyłce jest nieprawidłowa. */
    const ERROR_CONSIGNMENT_NUMBER_OF_PARCELS_IS_INCORRECT = 'err_cons_number_of_parcels_is_incorrect';

    /** Data nadania jest nieprawidłowa */
    const ERROR_DATE_IS_INVALID = 'err_date_is_invalid';

    /** Data nadania musi wskazywać następny dzień roboczy */
    const ERROR_DATE_MUST_INDICATE_AT_LEAST_THE_NEXT_WORKING_DAY
        = 'err_date_must_indicate_at_least_the_next_working_day';

    /** Nazwa 1 odbiorcy jest pusta. */
    const ERROR_CONSIGNMENT_RECEIVER_NAME1_EMPTY = 'err_cons_receiver_name1_empty';

    /** Kod kraju odbiorcy jest pusty. */
    const ERROR_CONSIGNMENT_RECEIVER_COUNTRY_EMPTY = 'err_cons_receiver_country_empty';

    /** Kod kraju odbiorcy jest niepoprawny. */
    const ERROR_CONSIGNMENT_RECEIVER_COUNTRY_CODE_IS_INVALID = 'err_cons_receiver_country_code_is_invalid';

    /** Kod pocztowy obiorcy jest pusty. */
    const ERROR_CONSIGNMENT_RECEIVER_ZIPCODE_EMPTY = 'err_cons_receiver_zipcode_empty';


    /** Kod pocztowy odbiorcy jest niepoprawny. */
    const err_cons_receiver_zipcode_is_invalid = 'err_cons_receiver_zipcode_is_invalid';

    /** Kod pocztowy odbiorcy nie odpowiada podanej nazwie miejscowości odbioru. */
    const err_cons_receiver_zipcode_does_not_correspond_to_city_name = 'err_cons_receiver_zipcode_does_not_correspond_to_city_name';

    /** Format kod pocztowego odbiorcy jest nieprawidłowy. */
    const err_cons_receiver_zipcode_format_is_invalid = 'err_cons_receiver_zipcode_format_is_invalid';

    /** Miejscowość odbiorcy jest pusta. */
    const err_cons_receiver_city_empty = 'err_cons_receiver_city_empty';

    /** Ulica odbiorcu jest pusta. */
    const err_cons_receiver_street_empty = 'err_cons_receiver_street_empty';

    /** Dane adresowe nie występuja w książce adresowej (korporacja) */
    const err_cons_receiver_address_not_exist_in_addressbook = 'err_cons_receiver_address_not_exist_in_addressbook';

    /** Referencje zawierają nieprawidłowe dane (korporacja). */
    const err_cons_references_contain_invalid_data = 'err_cons_references_contain_invalid_data';


    /** Kwota usługi COD jest nieprawidłowa. */
    const err_cons_srv_amount_of_cod_is_incorrect = 'err_cons_srv_amount_of_cod_is_incorrect';

    /** Kwota usługi COD jest za duża. Maksymalną wartość można uzyskać metodą adeServices_GetMaxCOD. */
    const err_cons_srv_amount_of_cod_is_too_large = 'err_cons_srv_amount_of_cod_is_too_large';

    /** Przynajmniej jedna z usług jest niedostępna dla odbiorców poza granicami Polski. */
    const err_cons_srv_for_countries_other_than_pl_are_not_available = 'err_cons_srv_for_countries_other_than_pl_are_not_available';

    /** Usługa PS i/lub PR nie jest realizowana dla podanego kraju. */
    const err_cons_srv_pspr_is_not_realized_for_given_country = 'err_cons_srv_pspr_is_not_realized_for_given_country';

    /** Usługa PS i/lub PR adres doręczenia musi znajdować się w Polsce. */
    const err_cons_srv_pspr_delivery_address_must_be_in_poland = 'err_cons_srv_pspr_delivery_address_must_be_in_poland';

    /** Usługa PS nie może zostać zrealizowana dla podanych państw. */
    const err_cons_srv_ps_for_given_countries_can_not_be_realized = 'err_cons_srv_ps_for_given_countries_can_not_be_realized';



    /** Usługa dostawy do 10:00 nie jest dostępna dla podanego kodu kraju i kodu pocztowego. */
    const err_cons_srv_10_unavailable_for_given_country_and_postal_code = 'err_cons_srv_10_unavailable_for_given_country_and_postal_code';

    /** Usługa dostawy do 12:00 nie jest dostępna dla podanego kodu kraju i kodu pocztowego. */
    const err_cons_srv_12_unavailable_for_given_country_and_postal_code = 'err_cons_srv_12_unavailable_for_given_country_and_postal_code';

    /** Usługa dostawy w sobotę nie jest dostępna dla podanego kodu kraju i kodu pocztowego. */
    const err_cons_srv_sat_unavailable_for_given_country_and_postal_code = 'err_cons_srv_sat_unavailable_for_given_country_and_postal_code';



    /** Usługa COD nie jest dostępna. */
    const err_cons_srv_cod_service_is_unavailable = 'err_cons_srv_cod_service_is_unavailable';

    /** Usługa EXW nie jest dostępna. */
    const err_cons_srv_exw_service_is_unavailable = 'err_cons_srv_exw_service_is_unavailable';

    /** Usługa ROD nie jest dostępna. */
    const err_cons_srv_rod_service_is_unavailable = 'err_cons_srv_rod_service_is_unavailable';

    /** Usługa POD nie jest dostępna. */
    const err_cons_srv_pod_service_is_unavailable = 'err_cons_srv_pod_service_is_unavailable';

    /** Usługa EXC nie jest dostępna. */
    const err_cons_srv_exc_service_is_unavailable = 'err_cons_srv_exc_service_is_unavailable';

    /** Usługa IDENT nie jest dostępna. */
    const err_cons_srv_ident_service_is_unavailable = 'err_cons_srv_ident_service_is_unavailable';

    /** Usługa DAW nie jest dostępna. */
    const err_cons_srv_daw_service_is_unavailable = 'err_cons_srv_daw_service_is_unavailable';

    /** Usługa PS nie jest dostępna. */
    const err_cons_srv_ps_service_is_unavailable = 'err_cons_srv_ps_service_is_unavailable';

    /** Usługa PR nie jest dostępna. */
    const err_cons_srv_pr_service_is_unavailable = 'err_cons_srv_pr_service_is_unavailable';

    /** Usługa dostawy do 10:00 nie jest dostępna. */
    const err_cons_srv_10_service_is_unavailable = 'err_cons_srv_10_service_is_unavailable';

    /** Usługa dostawy do 12:00 nie jest dostępna. */
    const err_cons_srv_12_service_is_unavailable = 'err_cons_srv_12_service_is_unavailable';

    /** Usługa dostawy w sobotę nie jest dostępna. */
    const err_cons_srv_sat_service_is_unavailable = 'err_cons_srv_sat_service_is_unavailable';

    /** Usługa odbioru własnego nie jest dostępna. */
    const err_cons_srv_pyo_service_is_unavailable = 'err_cons_srv_pyo_service_is_unavailable';

    /** Usługa ShopReturn nie jest dostępna. */
    const err_cons_srv_srs_service_is_unavailable = 'err_cons_srv_srs_service_is_unavailable';

    /** Przesyłka bez usług (serwisów) */
    const err_cons_srv_standard_no_services = 'err_cons_srv_standard_no_services';

    /** Nieprawidłowa kombinacja serwisów. */
    const err_cons_srv_incorrect_combination_of_services = 'err_cons_srv_incorrect_combination_of_services';



    /** Usługa DAW - Pole imię i nazwisko jest puste. */
    const err_cons_srv_daw_first_and_last_name_empty = 'err_cons_srv_daw_first_and_last_name_empty';



    /** Usługa EXC - Imię i nazwisko nadawcy jest puste. */
    const err_cons_srv_exc_sender_name1_empty = 'err_cons_srv_exc_sender_name1_empty';

    /** Usługa EXC - Kod kraju nadawcy jest pusty. */
    const err_cons_srv_exc_sender_country_empty = 'err_cons_srv_exc_sender_country_empty';

    /** Usługa EXC - Kod pocztowy nadawcy jest pusty. */
    const err_cons_srv_exc_sender_zipcode_empty = 'err_cons_srv_exc_sender_zipcode_empty';

    /** Usługa EXC - Miejscowość nadawcy jest pusta. */
    const err_cons_srv_exc_sender_city_empty = 'err_cons_srv_exc_sender_city_empty';

    /** Usługa EXC - Ulica nadawcy jest pusta. */
    const err_cons_srv_exc_sender_street_empty = 'err_cons_srv_exc_sender_street_empty';

    /** Usługa EXC - Kod kraju nadawcy jest nieprawidłowy. */
    const err_cons_srv_exc_sender_country_code_is_invalid = 'err_cons_srv_exc_sender_country_code_is_invalid';

    /** Usługa EXC - Kod pocztowy nadawcy jest nieprawidłowy. */
    const err_cons_srv_exc_sender_zipcode_is_invalid = 'err_cons_srv_exc_sender_zipcode_is_invalid';

    /** Usługa EXC - Kod pocztowy nadawcy nie odpowiada podanej nazwie miejscowości nadawcy. */
    const err_cons_srv_exc_sender_zipcode_does_not_correspond_to_city_name = 'err_cons_srv_exc_sender_zipcode_does_not_correspond_to_city_name';

    /** Usługa EXC - Format kod pocztowego nadawcy jest nieprawidłowy. */
    const err_cons_srv_exc_sender_zipcode_format_is_invalid = 'err_cons_srv_exc_sender_zipcode_format_is_invalid';


    /** Usługa EXC - Imię i nazwisko odbiorcy jest puste. */
    const err_cons_srv_exc_rec_name1_empty = 'err_cons_srv_exc_rec_name1_empty';

    /** Usługa EXC - Kod kraju odbiorcy jest pusty. */
    const err_cons_srv_exc_rec_country_empty = 'err_cons_srv_exc_rec_country_empty';

    /** Usługa EXC - Kod pocztowy odbiorcy jest pusty. */
    const err_cons_srv_exc_rec_zipcode_empty = 'err_cons_srv_exc_rec_zipcode_empty';

    /** Usługa EXC - Miejscowość odbiorcy jest pusta. */
    const err_cons_srv_exc_rec_city_empty = 'err_cons_srv_exc_rec_city_empty';

    /** Usługa EXC - Ulica odbiorcy jest pusta. */
    const err_cons_srv_exc_rec_street_empty = 'err_cons_srv_exc_rec_street_empty';

    /** Usługa EXC - Kod kraju odbiorcy jest nieprawidłowy. */
    const err_cons_srv_exc_rec_country_code_is_invalid = 'err_cons_srv_exc_rec_country_code_is_invalid';

    /** Usługa EXC - Kod pocztowy odbiorcy jest pusty. */
    const err_cons_srv_exc_rec_zipcode_is_invalid = 'err_cons_srv_exc_rec_zipcode_is_invalid';

    /** Usługa EXC - Kod pocztowy odbiorcy nie odpowiada podanej nazwie miejscowości odbiorcy. */
    const err_cons_srv_exc_rec_zipcode_does_not_correspond_to_city_name = 'err_cons_srv_exc_rec_zipcode_does_not_correspond_to_city_name';

    /** Usługa EXC - Format kod pocztowego odbiorcy jest nieprawidłowy. */
    const err_cons_srv_exc_rec_zipcode_format_is_invalid = 'err_cons_srv_exc_rec_zipcode_format_is_invalid';



    /** Usługa EXC - Waga przesyłki nie jest liczbą. */
    const err_cons_srv_exc_weight_is_not_a_number = 'err_cons_srv_exc_weight_is_not_a_number';

    /** Usługa EXC - Waga przesyłki jest mniejsza niż zero. Waga pojedynczej paczki nie może być mniejsza od 0,01kg (10g). */
    const err_cons_srv_exc_weight_is_less_than_zero = 'err_cons_srv_exc_weight_is_less_than_zero';

    /** Usługa EXC - Waga paczki jest za duża. */
    const err_cons_srv_exc_weight_of_parcel_is_to_large = 'err_cons_srv_exc_weight_of_parcel_is_to_large';



    /** Usługa IDENT - Pole imię i nazwisko jest puste. */
    const err_cons_srv_ident_firstlastname_empty = 'err_cons_srv_ident_firstlastname_empty';

    /** Usługa IDENT - Kod kraju jest pusty. */
    const err_cons_srv_ident_country_empty = 'err_cons_srv_ident_country_empty';

    /** Usługa IDENT - Kod pocztowy jest pusty. */
    const err_cons_srv_ident_zipcode_empty = 'err_cons_srv_ident_zipcode_empty';

    /** Usługa IDENT - Miejscowość jest pusta. */
    const err_cons_srv_ident_city_empty = 'err_cons_srv_ident_city_empty';

    /** Usługa IDENT - Ulica jest pusta. */
    const err_cons_srv_ident_street_empty = 'err_cons_srv_ident_street_empty';

    /** Usługa IDENT - Data urodzenia jest pusta. */
    const err_cons_srv_ident_datebirth_is_invalid = 'err_cons_srv_ident_datebirth_is_invalid';

    /** Usługa IDENT - Numer dokumentu potwierdzającego tożsamość jest pusty. */
    const err_cons_srv_ident_identity_card_number_empty = 'err_cons_srv_ident_identity_card_number_empty';

    /** Usługa IDENT - Typ dokumentu potwierdzającego tożsamość jest niepoprawny. */
    const err_cons_srv_ident_identity_document_type_is_invalid = 'err_cons_srv_ident_identity_document_type_is_invalid';

    /** Usługa IDENT - Kod kraju jest nieprawidłowy. */
    const err_cons_srv_ident_country_code_is_invalid = 'err_cons_srv_ident_country_code_is_invalid';

    /** Usługa IDENT - Kod pocztowy jest nieprawidłowy. */
    const err_cons_srv_ident_zipcode_is_invalid = 'err_cons_srv_ident_zipcode_is_invalid';

    /** Usługa IDENT - Kod pocztowy nie odpowiada podanej nazwie miejscowości. */
    const err_cons_srv_ident_zipcode_does_not_correspond_to_city_name = 'err_cons_srv_ident_zipcode_does_not_correspond_to_city_name';

    /** Usługa IDENT - Format kod pocztowego jest nieprawidłowy. */
    const err_cons_srv_ident_zipcode_format_is_invalid = 'err_cons_srv_ident_zipcode_format_is_invalid';



    /** Usługa PS - Imię i nazwisko nadawcy jest puste. */
    const err_cons_srv_ps_sender_name1_empty = 'err_cons_srv_ps_sender_name1_empty';

    /** Usługa PS - Kod kraju nadawcy jest pusty. */
    const err_cons_srv_ps_sender_country_empty = 'err_cons_srv_ps_sender_country_empty';

    /** Usługa PS - Kod pocztowy nadawcy jest pusty. */
    const err_cons_srv_ps_sender_zipcode_empty = 'err_cons_srv_ps_sender_zipcode_empty';

    /** Usługa PS - Miejscowość nadawcy jest pusta. */
    const err_cons_srv_ps_sender_city_empty = 'err_cons_srv_ps_sender_city_empty';

    /** Usługa PS - Ulica nadawcy jest pusta. */
    const err_cons_srv_ps_sender_street_empty = 'err_cons_srv_ps_sender_street_empty';

    /** Usługa PS - Kod kraju nadawcy jest nieprawidłowy. */
    const err_cons_srv_ps_sender_country_code_is_invalid = 'err_cons_srv_ps_sender_country_code_is_invalid';

    /** Usługa PS - Kod pocztowy nadawcy jest nieprawidłowy. */
    const err_cons_srv_ps_sender_zipcode_is_invalid = 'err_cons_srv_ps_sender_zipcode_is_invalid';

    /** Usługa PS - Kod pocztowy nadawcy nie odpowiada podanej nazwie miejscowości nadawcy. */
    const err_cons_srv_ps_sender_zipcode_does_not_correspond_to_city_name = 'err_cons_srv_ps_sender_zipcode_does_not_correspond_to_city_name';

    /** Usługa PS - Format kod pocztowego nadawcy jest nieprawidłowy. */
    const err_cons_srv_ps_sender_zipcode_format_is_invalid = 'err_cons_srv_ps_sender_zipcode_format_is_invalid';


    /** Usługa PS - Imię i nazwisko odbiorcy jest puste. */
    const err_cons_srv_ps_rec_name1_empty = 'err_cons_srv_ps_rec_name1_empty';

    /** Usługa PS - Kod kraju odbiorcy jest pusty. */
    const err_cons_srv_ps_rec_country_empty = 'err_cons_srv_ps_rec_country_empty';

    /** Usługa PS - Kod pocztowy odbiorcy jest pusty. */
    const err_cons_srv_ps_rec_zipcode_empty = 'err_cons_srv_ps_rec_zipcode_empty';

    /** Usługa PS - Miejscowość odbiorcy jest pusta. */
    const err_cons_srv_ps_rec_city_empty = 'err_cons_srv_ps_rec_city_empty';

    /** Usługa PS - Ulica odbiorcy jest pusta. */
    const err_cons_srv_ps_rec_street_empty = 'err_cons_srv_ps_rec_street_empty';

    /** Usługa PS - Kod kraju odbiorcy jest nieprawidłowy. */
    const err_cons_srv_ps_rec_country_code_is_invalid = 'err_cons_srv_ps_rec_country_code_is_invalid';

    /** Usługa PS - Kod pocztowy odbiorcy jest nieprawidłowy. */
    const err_cons_srv_ps_rec_zipcode_is_invalid = 'err_cons_srv_ps_rec_zipcode_is_invalid';

    /** Usługa PS - Kod pocztowy odbiorcy nie odpowiada podanej nazwie miejscowości odbiorcy. */
    const err_cons_srv_ps_rec_zipcode_does_not_correspond_to_city_name = 'err_cons_srv_ps_rec_zipcode_does_not_correspond_to_city_name';

    /** Usługa PS - Format kod pocztowego odbiorcy jest nieprawidłowy. */
    const err_cons_srv_ps_rec_zipcode_format_is_invalid = 'err_cons_srv_ps_rec_zipcode_format_is_invalid';


    /** Usługa PS - Waga przesyłki nie jest liczbą. */
    const err_cons_srv_ps_weight_is_not_a_number = 'err_cons_srv_ps_weight_is_not_a_number';

    /** Usługa PS - Waga przesyłki jest mniejsza niż zero. Waga pojedynczej paczki nie może być mniejsza od 0,01kg (10g). */
    const err_cons_srv_ps_weight_is_less_than_zero = 'err_cons_srv_ps_weight_is_less_than_zero';

    /** Usługa PS - Waga paczki jest za duża. */
    const err_cons_srv_ps_weight_of_parcel_is_to_large = 'err_cons_srv_ps_weight_of_parcel_is_to_large';



    /** Usługa SRS - Oba adresy (adres odsyłającego towar i adres odbiorcy SRS) muszą być na terytorium Polski. */
    const err_cons_srv_srs_both_addresses_must_be_in_poland = 'err_cons_srv_srs_both_addresses_must_be_in_poland';


    /** Usługa SRS - Pole Nazwa 1 odsyłającego towar jest puste. */
    const err_cons_srv_srs_sendback_name1_empty = 'err_cons_srv_srs_sendback_name1_empty';

    /** Usługa SRS - Kod kraju odsyłającego towar jest pusty. */
    const err_cons_srv_srs_sendback_country_empty = 'err_cons_srv_srs_sendback_country_empty';

    /** Usługa SRS - Kod pocztowy odsyłającego towar jest pusty. */
    const err_cons_srv_srs_sendback_zipcode_empty = 'err_cons_srv_srs_sendback_zipcode_empty';

    /** Usługa SRS - Miejscowość odsyłającego towar jest pusta. */
    const err_cons_srv_srs_sendback_city_empty = 'err_cons_srv_srs_sendback_city_empty';

    /** Usługa SRS - Ulica odsyłającego towar jest pusta. */
    const err_cons_srv_srs_sendback_street_empty = 'err_cons_srv_srs_sendback_street_empty';

    /** Usługa SRS - Kod kraju odsyłającego towar jest nieprawidłowy. */
    const err_cons_srv_srs_sendback_country_code_is_invalid = 'err_cons_srv_srs_sendback_country_code_is_invalid';

    /** Usługa SRS - Kod pocztowy odsyłającego towar jest nieprawidłowy. */
    const err_cons_srv_srs_sendback_zipcode_is_invalid = 'err_cons_srv_srs_sendback_zipcode_is_invalid';

    /** Usługa SRS - Kod pocztowy odsyłającego towar nie odpowiada podanej nazwie miejscowości odsyłającego towar. */
    const err_cons_srv_srs_sendback_zipcode_does_not_correspond_to_city_name = 'err_cons_srv_srs_sendback_zipcode_does_not_correspond_to_city_name';

    /** Usługa SRS - Format kod pocztowego odsyłającego towar jest nieprawidłowy. */
    const err_cons_srv_srs_sendback_zipcode_format_is_invalid = 'err_cons_srv_srs_sendback_zipcode_format_is_invalid';


    /** Usługa SRS - Imię i nazwisko odbiorcy jest puste. */
    const err_cons_srv_srs_rec_name1_empty = 'err_cons_srv_srs_rec_name1_empty';

    /** Usługa SRS - Kod kraju odbiorcy jest pusty. */
    const err_cons_srv_srs_rec_country_empty = 'err_cons_srv_srs_rec_country_empty';

    /** Usługa SRS - Kod pocztowy odbiorcy jest pusty. */
    const err_cons_srv_srs_rec_zipcode_empty = 'err_cons_srv_srs_rec_zipcode_empty';

    /** Usługa SRS - Miejscowość odbiorcy jest pusta. */
    const err_cons_srv_srs_rec_city_empty = 'err_cons_srv_srs_rec_city_empty';

    /** Usługa SRS - Ulica odbiorcy jest pusta. */
    const err_cons_srv_srs_rec_street_empty = 'err_cons_srv_srs_rec_street_empty';

    /** Usługa SRS - Kod kraju odbiorcy jest nieprawidłowy. */
    const err_cons_srv_srs_rec_country_code_is_invalid = 'err_cons_srv_srs_rec_country_code_is_invalid';

    /** Usługa SRS - Kod pocztowy odbiorcy jest nieprawidłowy. */
    const err_cons_srv_srs_rec_zipcode_is_invalid = 'err_cons_srv_srs_rec_zipcode_is_invalid';

    /** Usługa SRS - Kod pocztowy odbiorcy nie odpowiada podanej nazwie miejscowości odbiorcy. */
    const err_cons_srv_srs_rec_zipcode_does_not_correspond_to_city_name = 'err_cons_srv_srs_rec_zipcode_does_not_correspond_to_city_name';

    /** Usługa SRS - Format kod pocztowego odbiorcy jest nieprawidłowy. */
    const err_cons_srv_srs_rec_zipcode_format_is_invalid = 'err_cons_srv_srs_rec_zipcode_format_is_invalid';


    /** Usługa SRS - Waga przesyłki nie jest liczbą. */
    const err_cons_srv_srs_weight_is_not_a_number = 'err_cons_srv_srs_weight_is_not_a_number';

    /** Usługa SRS - Waga przesyłki jest mniejsza niż zero. Waga pojedynczej paczki nie może być mniejsza od 0,01kg (10g). */
    const err_cons_srv_srs_weight_is_less_than_zero = 'err_cons_srv_srs_weight_is_less_than_zero';

    /** Usługa SRS - Waga paczki jest za duża. */
    const err_cons_srv_srs_weight_of_parcel_is_to_large = 'err_cons_srv_srs_weight_of_parcel_is_to_large';



    /** Problem z numeracją paczek. Dotyczy paczkek z usługami PS/PR. */
    const err_cons_parcel_numbers_problem = 'err_cons_parcel_numbers_problem';


    /** Identyfikator MPK jest niepoprawny. Błęd ten występuje zazwyczaj podczas próby użycia identyfikatora MPK niewystępującego na dozwolonej liście MPK. */
    const err_cons_pfc_invalid = 'err_cons_pfc_invalid';

    /** Adres nadawcy: Pole Nazwa 1 jest puste. */
    const err_cons_sender_address_name1_empty = 'err_cons_sender_address_name1_empty';

    /** Adres nadawcy: Kod kraju jest pusty. */
    const err_cons_sender_address_country_empty = 'err_cons_sender_address_country_empty';

	/** Adres nadawcy: Kod pocztowy jest pusty. */
	const err_cons_sender_address_zipcode_empty = 'err_cons_sender_address_zipcode_empty';

	/** Adres nadawcy: Miejscowość jest pusta. */
	const err_cons_sender_address_city_empty = 'err_cons_sender_address_city_empty';

	/** Adres nadawcy: Ulica jest pusta. */
	const err_cons_sender_address_street_empty = 'err_cons_sender_address_street_empty';

	/** Adres nadawcy: Kod kraju jest nieprawidłowy. */
	const err_cons_sender_address_country_code_is_invalid = 'err_cons_sender_address_country_code_is_invalid';

	/** Adres nadawcy: Kod pocztowy jest nieprawidłowy. */
	const err_cons_sender_address_zipcode_is_invalid = 'err_cons_sender_address_zipcode_is_invalid';

	/** Adres nadawcy: Kod pocztowy nie odpowiada podanej nazwie miejscowości. */
	const err_cons_sender_address_zipcode_does_not_correspond_to_city_name = 'err_cons_sender_address_zipcode_does_not_correspond_to_city_name';

	/** Adres nadawcy: Format kod pocztowego jest nieprawidłowy. */
	const err_cons_sender_address_zipcode_format_is_invalid = 'err_cons_sender_address_zipcode_format_is_invalid';

	/** Adres nadawcy jest nieprawidłowy czyli nie występuje na liście adresów dozwolonych. */
	const err_cons_sender_address_invalid = 'err_cons_sender_address_invalid';

	/** Identyfikator sesji nie został znaleziony. Uzyskanie nowego identyfikatora możliwe jest tylko za pomocą funkcji logowania do systemu. */
	const err_sess_not_found = 'err_sess_not_found';

	/** Ważność identyfikatora sesji wygasła. Aplikacja kliencka próbowała komunikować się z systemem po upływie czasu określonym w Wytycznych dla aplikacji. */
	const err_sess_expired = 'err_sess_expired';

	/** Użytkownik nie posiada odpowiednich uprawnień, aby wykonać podaną metodę. */
	const err_user_insufficient_permissions = 'err_user_insufficient_permissions';

    /** Użytkownik nie może dodawać nowych paczek z powodu blokady windykacyjnej. */
    const err_user_debt_collection_lock = 'err_user_debt_collection_lock';

    /**
     * @return string
     */
    public function getApiErrorCode();
}
