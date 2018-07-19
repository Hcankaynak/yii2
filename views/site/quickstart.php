<?php
require __DIR__ . '../../../vendor/autoload.php';
/*
if (php_sapi_name() != 'cli') {
    throw new Exception('This application must be run on the command line.');
}
*/
/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient()
{
    $client = new Google_Client();
    $client->setApplicationName('Google Drive API PHP Quickstart');
    $client->setScopes(Google_Service_Drive::DRIVE_METADATA_READONLY);
    $client->setAuthConfig('credentials.json');
    $client->setAccessType('offline');

    // Load previously authorized credentials from a file.
    $credentialsPath = 'token.json';
    if (file_exists($credentialsPath)) {
        $accessToken = json_decode(file_get_contents($credentialsPath), true);
    } else {
        // Request authorization from the user.
        $authUrl = $client->createAuthUrl();
        printf("Open the following link in your browser:\n%s\n", $authUrl);
        print 'Enter verification code: ';
        $authCode = trim(fgets(STDIN));

        // Exchange authorization code for an access token.
        $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

        // Store the credentials to disk.
        if (!file_exists(dirname($credentialsPath))) {
            mkdir(dirname($credentialsPath), 0700, true);
        }
        file_put_contents($credentialsPath, json_encode($accessToken));
        printf("Credentials saved to %s\n", $credentialsPath);
    }
    $client->setAccessToken($accessToken);

    // Refresh the token if it's expired.
    if ($client->isAccessTokenExpired()) {
        $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        file_put_contents($credentialsPath, json_encode($client->getAccessToken()));
    }
    return $client;
}


// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Drive($client);

// Print the names and IDs for up to 10 files.
$optParams = array(
  'pageSize' => 10,
  'fields' => 'nextPageToken, files(id, name)'
);
$results = $service->files->listFiles($optParams);

if (count($results->getFiles()) == 0) {
    print "No files found.\n";
} else {
    print "Files:\n";
    foreach ($results->getFiles() as $file) {
        printf("%s (%s)\n", $file->getName(), $file->getId());
    }
}

$fileMetadata = new Google_Service_Drive_DriveFile(array(
    'name' => 'photo.jpeg'));

$content = file_get_contents('photo.jpeg');
$file = $service->files->create($fileMetadata, array(
    'data' => $content,
    'mimeType' => 'image/jpeg',
    'uploadType' => 'multipart',
    'fields' => 'id'));
printf("File ID: %s\n", $file->id);


/*
$fileMetadata = new Google_Service_Drive_DriveFile(array(
    ‘name’ =>‘sdfgyhjk.jpeg’));
‘mime’ => ‘application/vnd.google-apps.spreadsheet’));
$content = file_get_contents(‘uploads/batman.jpeg’);

$file = $service->files->create($fileMetadata, array(
    ‘data’ => $content ,
     ‘mimeType’ =>‘image/jpeg’,
      ‘uploadType’ => ‘multipart ’,
      ‘fields’ => ‘id’));
printf(“File ID: %s\n”,$file->id);
*/
