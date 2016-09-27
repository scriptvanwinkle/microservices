<?
/*******************************************************
* NAME: Definition Microservice
* PUPROSE: Look up the definition of the passed word in the Merriam Webster Dictionary API and return.
* RETURNS: JSON (The definition in a JSON wrapper)
* INPUT:
*    $strWord -  The word we want the definition for.  Passed in GET call as main argument
* PROCESS:
*     Parse out the word whose definition we are looking up.
*     Build Request URL
*     Make call to api
*     Parse returned XML
*     Pull definition from result
*     Output definition.
************************************************************** */
  // Parse out the word whose definition we are looking up
    $strWord = "microservice";

  // Build Request URL
    $strDictionaryURL = "http://www.dictionaryapi.com/api/v1/references/collegiate/xml/" . $strWord . "?key=[YOUR KEY GOES HERE]";
  
  // Make call to api
    $oCurl = curl_init();
    curl_setopt($oCurl, CURLOPT_URL, $strDictionaryURL);
    $xmlResult = curl_exec($oCurl);
    curl_close($oCurl);
  
  // Parse returned XML
    $oResult = simplexml_load_string($xmlResult);
 
  // Pull definition from result
    $strDefinition = $oResult->entry->def->dt;

  // Output definition
    echo $strDefinition;


?>


    

