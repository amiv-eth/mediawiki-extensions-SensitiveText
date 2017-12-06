# SensitiveText (MediaWiki Extension)
Additionally provides the tags <sensitive></sensitive> and <hide></hide>. The sensitive tag hides text on public pages. The text is then only accessible to logged in users. The hide tag hides the text for all users. It can be displayed by clicking on the placeholder text. IMPORTANT! Caching must not be enabled if this extension is used.

## Usage
Enable the extension with the following line in your <code>LocalSettings.php</code> file:

    wfLoadExtension('SensitiveText');

Once the extension is enabled on your MediaWiki installation, you are able to hide some parts of an article to anonymouse users as follows:

    <sensitive>Sensitive Text comes here...</sensitive>

You can hide some text on page load with <hide>Hidden text</hide>. Click on the placeholder to show the hidden text.
