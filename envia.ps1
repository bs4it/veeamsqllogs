$json = Get-Content -Path ./teste.json
$URI = "http://localhost:81/webservice/get_gaps.php"
$URI = "https://veeamsqllogs.bs4it.com.br/webservice/get_gaps.php"

$web = Invoke-WebRequest -SkipCertificateCheck -Uri $URI -Method Post -Body $json -ContentType 'application/json; charset=UTF-8' 

$web