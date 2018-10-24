// function to shorten url
function my_custom_url_shorten($long_url) {
  $service_url = 'https://www.googleapis.com/urlshortener/v1/url?key=******* your google url shorten api key *******';

  // Create cURL
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, $service_url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array("longUrl" => $long_url)));
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  // Execute the post
  $result = curl_exec($ch);

  // Close the connection
  curl_close($ch);

  // Return the result
  $curl_response = json_decode($result, true);

  $id = isset($curl_response['id']) ? $curl_response['id'] : false;

  return $id;
}
