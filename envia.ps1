$json = Get-Content -Path ./teste.json
$url = "http://localhost:81/insert2.php"

$web = Invoke-WebRequest -SkipCertificateCheck -Uri $url -Method Post -Body $json -ContentType 'application/json; charset=UTF-8' 

