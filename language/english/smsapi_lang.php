<?php
# Version 1.0.0
$lang['smsapi'] = 'SMSAPI';
$lang['smsapi_log'] = 'SMSAPI Log';
$lang['smsapi_log2'] = 'SMSAPI Log';

$lang['smsapi_apikey_label'] = 'API Key';
$lang['smsapi_apikey_info'] = 'You can find the API Key in your SMSAPI account';
$lang['smsapi_from_label'] = 'Sender Name';
$lang['smsapi_from_info'] = 'Enter your sender name defined in the SMSAPI panel. Leaving it empty will result in sending messages with the default signature';
$lang['smsapi_servis_label'] = 'SMSAPI Service';
$lang['smsapi_servis_option_pl'] = 'Poland %s';
$lang['smsapi_servis_option_com'] = 'Global %s';
$lang['smsapi_servis_option_se'] = 'Sweden %s';
$lang['smsapi_servis_option_bg'] = 'Bulgaria %s';
$lang['smsapi_fast_label'] = 'Fast Message Delivery';
$lang['smsapi_fast_info'] = 'Sending messages using a separate channel that ensures fast message delivery. The number of points for sending will be multiplied by 1.5';
$lang['smsapi_normalize_label'] = 'Replace Special Characters';
$lang['smsapi_normalize_info'] = 'This option will replace special characters in the SMS message with their equivalents (e.g., ą-a, ć-c, ę-e...)';
$lang['smsapi_save_messagess_label'] = 'Log Sent Messages';
$lang['smsapi_save_messagess_info'] = 'Enabling this option will save sent SMS messages to the database and enable delivery reporting. %s';
$lang['smsapi_testsms_label'] = 'Test Mode';
$lang['smsapi_testsms_info'] = 'The SMS message is not sent, only a response is returned';

$lang['smsapi_status_NOT_FOUND_label'] = 'Not Found';
$lang['smsapi_status_EXPIRED_label'] = 'Expired';
$lang['smsapi_status_SENT_label'] = 'Sent';
$lang['smsapi_status_DELIVERED_label'] = 'Delivered';
$lang['smsapi_status_UNDELIVERED_label'] = 'Undelivered';
$lang['smsapi_status_FAILED_label'] = 'Failed';
$lang['smsapi_status_REJECTED_label'] = 'Rejected';
$lang['smsapi_status_UNKNOWN_label'] = 'Unknown';
$lang['smsapi_status_QUEUE_label'] = 'Queue';
$lang['smsapi_status_ACCEPTED_label'] = 'Accepted';
$lang['smsapi_status_RENEWAL_label'] = 'Renewal';
$lang['smsapi_status_STOP_label'] = 'Stopped';

$lang['smsapi_status_NOT_FOUND'] = 'Invalid ID number or the report has expired';
$lang['smsapi_status_EXPIRED'] = 'Message not delivered due to prolonged unavailability of the number';
$lang['smsapi_status_SENT'] = 'Message has been sent but the operator has not yet returned a delivery report';
$lang['smsapi_status_DELIVERED'] = 'Message delivered to the recipient';
$lang['smsapi_status_UNDELIVERED'] = 'Message not delivered (e.g., invalid number, unavailable number)';
$lang['smsapi_status_FAILED'] = 'Error during message sending - please report';
$lang['smsapi_status_REJECTED'] = 'Message not delivered (e.g., invalid number, unavailable number)';
$lang['smsapi_status_UNKNOWN'] = 'No delivery report for the message (message delivered or cannot be delivered)';
$lang['smsapi_status_QUEUE'] = 'Message is queued for sending';
$lang['smsapi_status_ACCEPTED'] = 'Message accepted by the operator';
$lang['smsapi_status_RENEWAL'] = 'An attempt to connect was made but not answered, the connection will be retried.';
$lang['smsapi_status_STOP'] = 'Stopped';

$lang['smsapi_errorcode_7'] = 'Shortened links are disabled on the account';
$lang['smsapi_errorcode_8'] = 'Error in reference (please report)';
$lang['smsapi_errorcode_11'] = 'Message too long or missing, or the parameter nounicode is set and special characters appear in the message. For VMS sending, the error means missing WAV file or TTS text error (missing text or other than UTF-8 encoding).';
$lang['smsapi_errorcode_12'] = 'Message consists of more parts than specified in the &max_parts parameter';
$lang['smsapi_errorcode_13'] = 'No valid phone numbers (invalid number, landline (in case of SMS sending) or on the blacklist)';
$lang['smsapi_errorcode_14'] = 'Invalid sender field';
$lang['smsapi_errorcode_17'] = 'Cannot send FLASH with special characters';
$lang['smsapi_errorcode_18'] = 'Invalid number of parameters';
$lang['smsapi_errorcode_19'] = 'Too many messages in one reference (too many recipients, in case of shortened link usage, the limit is 100)';
$lang['smsapi_errorcode_20'] = 'Invalid number of IDX parameters';
$lang['smsapi_errorcode_21'] = 'MMS message size too large (maximum 300kB)';
$lang['smsapi_errorcode_22'] = 'Invalid SMIL format';
$lang['smsapi_errorcode_23'] = 'Error downloading file for MMS or VMS message';
$lang['smsapi_errorcode_24'] = 'Invalid format of downloaded file';
$lang['smsapi_errorcode_25'] = 'Parameters &normalize and &datacoding cannot be used simultaneously.';
$lang['smsapi_errorcode_26'] = 'Message subject too long. The subject can contain a maximum of 30 characters.';
$lang['smsapi_errorcode_27'] = 'IDX parameter too long. Maximum 255 characters';
$lang['smsapi_errorcode_28'] = 'Invalid time_restriction parameter value. Available values are follow, ignore, or nearest_available';
$lang['smsapi_errorcode_30'] = 'Missing UDH parameter when datacoding=bin is set';
$lang['smsapi_errorcode_31'] = 'TTS conversion error';
$lang['smsapi_errorcode_32'] = 'Cannot send MMS and VMS messages to foreign numbers or sending to foreign countries is disabled on the account.';
$lang['smsapi_errorcode_33'] = 'No valid numbers';
$lang['smsapi_errorcode_35'] = 'Invalid tts_lector parameter value. Available values: agnieszka, ewa, jacek, jan, maja';
$lang['smsapi_errorcode_36'] = 'Cannot send binary messages with a footer set.';
$lang['smsapi_errorcode_37'] = 'TTS message is too long';
$lang['smsapi_errorcode_40'] = 'No group with the given name';
$lang['smsapi_errorcode_41'] = 'The selected group is empty (no contacts in the group)';
$lang['smsapi_errorcode_50'] = 'Cannot schedule sending more than 3 months in advance';
$lang['smsapi_errorcode_51'] = 'Invalid sending hour set, VMS messages can only be sent between 8 am and 10 pm or a combination of try and interval parameters causes a connection attempt after 10 pm.';
$lang['smsapi_errorcode_52'] = 'Too many attempts to send a message to one number (maximum 10 attempts within 60 seconds to one number)';
$lang['smsapi_errorcode_53'] = 'Non-unique idx parameter. The message with the given idx was sent in the last four days or is scheduled for future sending using the &check_idx=1 parameter.';
$lang['smsapi_errorcode_54'] = 'Invalid date format. Date validation set with &date_validate=1';
$lang['smsapi_errorcode_55'] = 'No landline numbers in the sending and the skip_gsm parameter is set';
$lang['smsapi_errorcode_56'] = 'The difference between the sending date and the expiration date cannot be less than 15 minutes and more than 72 hours';
$lang['smsapi_errorcode_57'] = 'Number is on the blacklist for the given user.';
$lang['smsapi_errorcode_59'] = 'Number is on the "Unsubscribed" list';
$lang['smsapi_errorcode_60'] = 'Code group with the given name does not exist.';
$lang['smsapi_errorcode_61'] = 'The validity date of the code group has expired.';
$lang['smsapi_errorcode_62'] = 'No free codes in the given group (all codes have already been used).';
$lang['smsapi_errorcode_65'] = 'Not enough discount codes for the sending. The number of unused codes in the group must be at least equal to the number of numbers in the sending.';
$lang['smsapi_errorcode_66'] = 'The message content lacks the [%code%] marker for sending with the &discount_group parameter (such a marker is required).';
$lang['smsapi_errorcode_70'] = 'Invalid CALLBACK address in the notify_url parameter.';
$lang['smsapi_errorcode_74'] = 'The sending date does not meet the time restrictions set on the account';
$lang['smsapi_errorcode_76'] = 'Invalid characters in request parameters';
$lang['smsapi_errorcode_94'] = 'Sending messages with a link is blocked';
$lang['smsapi_errorcode_96'] = 'Sending limit for the country has been reached';
$lang['smsapi_errorcode_98'] = 'Your account is restricted. You can only send messages to the number used during registration.';
$lang['smsapi_errorcode_101'] = 'Invalid or missing authorization data';
$lang['smsapi_errorcode_102'] = 'Invalid login or password';
$lang['smsapi_errorcode_103'] = 'No points for this user';
$lang['smsapi_errorcode_104'] = 'No template';
$lang['smsapi_errorcode_105'] = 'Invalid IP address (IP filter for API interface is enabled)';
$lang['smsapi_errorcode_106'] = 'Invalid URL to shorten in the [%go_to:URL%] parameter';
$lang['smsapi_errorcode_110'] = 'Service (SMS, MMS, VMS, or HLR) is not available on the account.';
$lang['smsapi_errorcode_112'] = 'Sending messages to phone numbers in this country is blocked on the account.';
$lang['smsapi_errorcode_200'] = 'Failed attempt to send a message, please retry the reference';
$lang['smsapi_errorcode_201'] = 'Internal system error (please report)';
$lang['smsapi_errorcode_202'] = 'Too many simultaneous references to the service, message not sent (please retry)';
$lang['smsapi_errorcode_203'] = 'Too many references to the service. Try again later. Applies to the endpoint https://api.smsapi.pl/subusers';
$lang['smsapi_errorcode_300'] = 'Invalid points field value (value 1 is required when using the points field)';
$lang['smsapi_errorcode_301'] = 'Message with the given ID does not exist or is scheduled to be sent within the next 60 seconds (cannot delete such a message).';
$lang['smsapi_errorcode_400'] = 'Invalid message status ID.';
$lang['smsapi_errorcode_401'] = 'Token does not have permission to perform the action.';
$lang['smsapi_errorcode_409'] = 'The given value already exists.';
$lang['smsapi_errorcode_997'] = 'HTTP requests are disabled on your account, please use a secure connection (HTTPS)';
$lang['smsapi_errorcode_998'] = 'The idz.do service is not available';
$lang['smsapi_errorcode_999'] = 'Internal system error (please report)';
$lang['smsapi_errorcode_1000'] = 'Action available only for the main user';
$lang['smsapi_errorcode_1001'] = 'Invalid action (expected one of add_user, set_user, get_user, credits)';
$lang['smsapi_errorcode_1010'] = 'Error adding user';
$lang['smsapi_errorcode_1020'] = 'Error editing user account';
$lang['smsapi_errorcode_1021'] = 'No data for editing, at least one parameter must be edited';
$lang['smsapi_errorcode_1030'] = 'Error fetching user data';
$lang['smsapi_errorcode_1032'] = 'User with the given name does not exist for the main user';
$lang['smsapi_errorcode_1100'] = 'User data error';
$lang['smsapi_errorcode_1110'] = 'Invalid name for the created user';
$lang['smsapi_errorcode_1111'] = 'No name provided for the created user account';
$lang['smsapi_errorcode_1112'] = 'User account name too short (minimum 3 characters)';
$lang['smsapi_errorcode_1113'] = 'User account name too long, the total length of the user name along with the main user prefix can be a maximum of 32 characters';
$lang['smsapi_errorcode_1114'] = 'Invalid characters in the user name, allowed characters are [A – Z], digits [0 – 9] and @, -, _, and';
$lang['smsapi_errorcode_1115'] = 'A user with the given name already exists';
$lang['smsapi_errorcode_1120'] = 'Password error for the created user account';
$lang['smsapi_errorcode_1121'] = 'Password for the created user account too short';
$lang['smsapi_errorcode_1122'] = 'Password for the created user account too long';
$lang['smsapi_errorcode_1123'] = 'Password should be encoded in MD5';
$lang['smsapi_errorcode_1130'] = 'Error in points limit assigned to the user';
$lang['smsapi_errorcode_1131'] = 'Parameter limit should contain a numeric value';
$lang['smsapi_errorcode_1140'] = 'Error in the monthly points limit assigned to the user';
$lang['smsapi_errorcode_1141'] = 'Parameter month_limit should contain a numeric value';
$lang['smsapi_errorcode_1150'] = 'Invalid value for senders parameter, acceptable values for this parameter are 0 or 1';
$lang['smsapi_errorcode_1160'] = 'Invalid value for phonebook parameter, acceptable values for this parameter are 0 or 1';
$lang['smsapi_errorcode_1170'] = 'Invalid value for active parameter, acceptable values for this parameter are 0 or 1';
$lang['smsapi_errorcode_1180'] = 'Parameter info error';
$lang['smsapi_errorcode_1183'] = 'Parameter info content is too long';
$lang['smsapi_errorcode_1190'] = 'API interface password error for the user account';
$lang['smsapi_errorcode_1192'] = 'Invalid length of API interface password for the user account (password encoded in MD5 should be 32 characters)';
$lang['smsapi_errorcode_1193'] = 'The interface password should be provided in MD5 encoded form';
$lang['smsapi_errorcode_2001'] = 'Invalid action (expected one of add, status, delete, list)';
$lang['smsapi_errorcode_2010'] = 'Error adding sender field';
$lang['smsapi_errorcode_2030'] = 'Error checking sender field status';
$lang['smsapi_errorcode_2031'] = 'Sender field with the given name does not exist';
$lang['smsapi_errorcode_2060'] = 'Error adding default sender field';
$lang['smsapi_errorcode_2061'] = 'Sender field must be active to set it as default';
$lang['smsapi_errorcode_2062'] = 'Sender field is already set as default';
$lang['smsapi_errorcode_2100'] = 'Data transmission error';
$lang['smsapi_errorcode_2110'] = 'Sender field name error';
$lang['smsapi_errorcode_2111'] = 'No name provided for the added sender field (parameter &add is empty)';
$lang['smsapi_errorcode_2112'] = 'Invalid sender field name (e.g., phone number, containing Polish and/or special characters or too long), sender field can be a maximum of 11 characters, allowed characters: a-z A-Z 0-9 - . [space]';
$lang['smsapi_errorcode_2115'] = 'Field with the given name already exists';

$lang['smsapi_id'] = 'ID';
$lang['smsapi_item_id'] = 'Record ID';
$lang['smsapi_hash'] = 'Hash';
$lang['smsapi_ms_id'] = 'Message ID';
$lang['smsapi_testsms'] = 'Test Message';
$lang['smsapi_error'] = 'Error';
$lang['smsapi_error_message'] = 'Error Description';
$lang['smsapi_error_invalid_numbers'] = 'Invalid Numbers';
$lang['smsapi_ms_status'] = 'Status';
$lang['smsapi_ms_statuses'] = 'Statuses';
$lang['smsapi_sms_to'] = 'SMS To';
$lang['smsapi_sms_from'] = 'SMS From';
$lang['smsapi_sms_message'] = 'SMS Content';
$lang['smsapi_ms_points'] = 'Sending Points';
$lang['smsapi_ms_number'] = 'Recipient Number with Prefix';
$lang['smsapi_ms_submitted_number'] = 'Recipient Number Provided in Request';
$lang['smsapi_created_at'] = 'Created At';
$lang['smsapi_updated_at'] = 'Updated At';
$lang['smsapi_ms_date_sent'] = 'Date Sent';

$lang['smsapi_table_switch_view'] = 'Switch View';
$lang['smsapi_table_key'] = 'Key';
$lang['smsapi_table_value'] = 'Value';
$lang['smsapi_confirm_delete'] = 'Are you sure you want to delete this record?';
$lang['smsapi_no_permissions'] = 'No Permissions';
$lang['smsapi_record_not_found'] = 'Record Not Found';