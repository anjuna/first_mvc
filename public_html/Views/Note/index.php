<h3>Note</h3>

<form method="post" action="<?php echo URL;?>note/create">


	<label>Title   </label>
			<input type="text" name="title" />

			 <br /><br />

	<label>Content</label>
			<textarea type="text" name="content" row"5" cols="60"></textarea>
	 <br /><br />
	<label>&nbsp;</label>
		<input type="submit" value="Hit me up"/>

</form>


<br><br><br>


<hr>



<div id="list">


<?php 
	foreach($this->noteList as $key=>$val){

			echo '<div id="note">';
			echo '<div id="title">'.$val->title.' <div id="date">'.$val->date_added.'</div></div>';
			echo '<div id="your_text">'.$val->content.'</div>';
			echo '<a class="delete_note" href="'.URL.'note/delete/'.$val->note_id.'">(Delete)</a>';
			echo '<a class="edit_note" href="'.URL.'note/edit/'.$val->note_id.'">(Edit)</a>';
			echo '</div>';


			}
?>


</div> 