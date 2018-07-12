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
			<?php
				$text=fopen('@demoin_bot_update.log','r');
				$text_content= fread($text,filesize("@demoin_bot_update.log"));
				fclose($text);
				
				$split_text_content=explode("\r",$text_content);
				foreach($split_text_content as $arr){
					if(strlen($arr) >0 ){
						$msg_json=json_decode($arr);
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
	</body>
	<script>
		setInterval(function(){
			window.location.reload();
		}, 5000)
	</script>
</html>
