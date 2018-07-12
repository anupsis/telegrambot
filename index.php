<html>
	<head>
		<title> 
			Test telegram bot
		</title>
	</head>
	<body>
		<h1>
			This index for tes telegram bot
		</h1>
		
		<p style="color:red">
			This page reload each 5 second
		</P>
		<table border = '1'>
			<thead>
				<tr>
					<th>
						Name
					</th>
					<th>
						Message
					</th>
					<th>
						Date
					</th>
				</tr>
			</thead>
			<tbody>
			<pre>
			<?php
				$text=fopen('@demoin_bot_update.log','r');
				$text_content= fread($text,filesize("@demoin_bot_update.log"));
				
				fclose($text);
				
				// $replace= str_replace("} {","} \r {",$text_content);
				// echo $replace;
				// $split_text_content=explode("\r",$replace);
				$split_text_content=explode("\n",$text_content);
				// echo count($split_text_content);
				// echo $split_text_content[0];
				// print_r($split_text_content);
				foreach($split_text_content as $arr){
					if(strlen($arr) >0 ){
						$msg_json=json_decode(trim($arr));
						// print_r($arr);
						// print_r($msg_json);
						if($msg_json != NULL){
							$name = $msg_json->message->from->first_name." ".$msg_json->message->from->last_name;
							$message = $msg_json->message->text;
							$date = gmdate("Y-m-d H:i:s", $msg_json->message->date);
							echo "<tr>
								<td>".$name."</td>
								<td>".$message."</td>
								<td>".$date."</td>
							</tr>";
						}
					}
				}
			?>
			</tbody>
		</table>
		
		<p>
			<small>
				Raw update log
			</small> <br>
			<?php print_r($text_content); ?>
		</p>
	</body>
	<script>
		setInterval(function(){
			window.location.reload();
		}, 5000)
	</script>
</html>
