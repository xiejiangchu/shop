$target ='http://yuedushangcheng.sdongpo.com/mobile/mobile/shoppingType'
$r = [System.Net.WebRequest]::Create($target);
$r.Timeout=3000;
$resp = $r.GetResponse();
$reqstream = $resp.GetResponseStream();
$sr = new-object System.IO.StreamReader $reqstream;
$result = $sr.ReadToEnd();
$o=$result|ConvertFrom-Json 
$o.data|ConvertTo-Json|Out-File -FilePath 'd:/veg/cat1.txt'
$category=$o.data.categoryList;
foreach($c in $category){
	$url='http://yuedushangcheng.sdongpo.com/mobile/mobile/shoppingType2?pid='+$c.id
	$name="cat2_"+$c.name+"_"+$c.id;
	
	$r = [System.Net.WebRequest]::Create($url);
	$r.Timeout=3000;
	$resp = $r.GetResponse();
	$reqstream = $resp.GetResponseStream();
	$sr = new-object System.IO.StreamReader $reqstream;
	$result = $sr.ReadToEnd();
	$o=$result|ConvertFrom-Json ;
	$o.data|ConvertTo-Json|Out-File -FilePath "d:/veg/$name.txt"
	$category2=$o.data.categoryList;
	foreach($i in $category2){
		$cat1=$c.id;
		$cat2=$i.id
		$url="http://yuedushangcheng.sdongpo.com/mobile/mobile/shoppingByType?page=1&type_id=$cat1&type_id2=$cat2";
		$name="商品_"+$c.name+"_"+$i.name;
		$r = [System.Net.WebRequest]::Create($url);
		$r.Timeout=3000;
		$resp = $r.GetResponse();
		$reqstream = $resp.GetResponseStream();
		$sr = new-object System.IO.StreamReader $reqstream;
		$result = $sr.ReadToEnd();
		$o=$result|ConvertFrom-Json ;
#		$o.total_page
		$o.data.productList.length
		if($o.data.productList.length -gt 0){
			$o.data|ConvertTo-Json|Out-File -FilePath "d:/veg/$name.txt"
		}
	}
}


