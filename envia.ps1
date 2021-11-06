$json = Get-Content -Path ./teste.json
$url = "http://localhost:81/webservice/get_gaps.php"

$web = Invoke-WebRequest -SkipCertificateCheck -Uri $url -Method Post -Body $json -ContentType 'application/json; charset=UTF-8' 

$web