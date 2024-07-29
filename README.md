# Perfex CRM - SMSAPI Module

![SMSAPI + Perfex CRM](./assets/img/banner_smsapi_perfex.png)

This module allows you to integrate SMSAPI services with Perfex CRM, enabling you to send SMS notifications directly from your CRM system.

## Available Languages

The module is available in the following languages:

- <img src="https://github.githubassets.com/images/icons/emoji/unicode/1f1f5-1f1f1.png?v8" alt="Polish" width="18" height="18"/> Polish
- <img src="https://github.githubassets.com/images/icons/emoji/unicode/1f1ec-1f1e7.png?v8" alt="English" width="18" height="20"/> English
- <img src="https://github.githubassets.com/images/icons/emoji/unicode/1f1f8-1f1ea.png?v8" alt="Swedish" width="18" height="20"/> Swedish
- <img src="https://github.githubassets.com/images/icons/emoji/unicode/1f1e7-1f1ec.png?v8" alt="Bulgarian" width="18" height="20"/> Bulgarian

## Installation Instructions

1. **Download the Latest Release**

   Go to the [Releases](https://github.com/rzietkowski/Perfex-CRM-SMSAPI-Module/releases) page of this repository and download the latest `smsapi.zip` file.

2. **Upload the Module**

   - Log in to your Perfex CRM admin panel.
   - Navigate to `Setup` > `Modules`.
   - Click on the `Upload Module` button.
   - Upload the `smsapi.zip` file you downloaded in step 1.

3. **Activate the Module**

   - After uploading, find the module in the list of available modules.
   - Click on the `Activate` button next to the module.

4. **Configure the Module**

   - Once activated, navigate to `Setup` > `Settings` > `SMS` > `SMSAPI`.
   - Enter your SMSAPI credentials and configure the settings as needed.

5. **Start Using the Module**

   - You can now start sending SMS notifications from Perfex CRM.

## Additional Configuration

1. **API Key Configuration**

   - Obtain your API key from the SMSAPI panel by navigating to `Settings` > `API Settings` > `API Tokens` > `+ Generate Token`.
   - Provide a token name of your choice and set the expiration date as needed.
   - Select the SMS permission and click `Generate Token`.
   - Copy the generated token and paste it into the API Key field in the module configuration.

2. **Sender Name Configuration**

   - Choose or add a sender name from the SMSAPI panel by navigating to `SMS Messages` > `Sender Fields`.
   - Select your sender field and copy it.
   - Paste it into the Sender Name field in the module configuration.

3. **Message Logging**

   - This module includes an additional feature for logging messages.
   - When enabled, it adds a new menu item under `Reports` > `SMSAPI Log`.
   - This logs sent messages and receives notifications from SMSAPI about message statuses.

## Troubleshooting

If you encounter any issues during installation or usage, please check the following:

- Ensure that you have the correct permissions to upload and activate modules in Perfex CRM.
- Verify that your SMSAPI credentials are correct.
- Check the Perfex CRM documentation for any additional requirements or compatibility issues.

For further assistance, feel free to open an issue on the [GitHub Issues](https://github.com/rzietkowski/Perfex-CRM-SMSAPI-Module/issues) page.

## License

This project is licensed under the Apache License Version 2.0. See the [LICENSE](LICENSE) file for details.