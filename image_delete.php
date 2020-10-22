<?php

// Include the editor SDK.
require 'sdk/froala/lib/froala_editor.php';

// Delete the file.
try {
  $response = FroalaEditor_File::delete($_POST['src']);
  echo stripslashes(json_encode('Success'));
}
catch (Exception $e) {
  http_response_code(404);
}

?>