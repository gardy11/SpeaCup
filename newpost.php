<div class="wrapper" >
	
            <section class="users">
                  <header>
                        <div class="content">
                              
							  <?php
							 
                              $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                              if (mysqli_num_rows($sql) > 0) {
                                    $row = mysqli_fetch_assoc($sql);
                              }else {
								header("location: users.php");
						     }
                              ?>					  
							

							<div class="dropdown" style="width: 200px">
								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" >
									點此選擇發文看板
								</button>
								<div class="dropdown-menu" id="SelectMe">
									<a class="dropdown-item" href="#" value="1" >時事</a>
									<a class="dropdown-item" href="#" value="2" >美食</a>
									<a class="dropdown-item" href="#" value="3" >演藝</a>

								</div>
							</div>
															

                              <img src="php/images/<?php echo $row['img']; ?>" alt="" />
                              <div class="details">
                                    <span><?php echo $row['nickname']; ?></span>
                                    <div><p style="font-weight: lighter;"><?php date_default_timezone_set('Asia/Taipei');
												echo date('Y/m/d H:i:s');
											?></p>
									</div>
							</div>							 					
                        </div>						
				 </header>
				 
				 
				        <form  method="POST" action="#" class="posting-area" enctype="multipart/form-data" > 

							  <input type="text" name="cid" class="cid" value="" hidden>	
							  <input type="text" name="aid" class="aid" value="<?php echo $aid; ?>" hidden>
							  <input type="text" name="unique_id" class="unique_id" value="<?php echo $unique_id; ?>" hidden>
							  <textarea rows="1" type ="text" name="title" id="autoresizing" spellcheck="false" class="input-field input-title" placeholder="標題" style="position:relative; top:5px; overflow:hidden; border:none; outline:none; width:90%; font-size:30px;"></textarea><br /><br />
							  
							  
							  <textarea contenteditable name="content" id="input-content" class="input-field input-content" spellcheck="false" placeholder="內容..." 
							  style="position:relative; top:2px; resize:none; overflow-y:auto; border:none; outline:none; height: 400px; width:90%;"></textarea>
							  
							  <br/><br/>	
							 
							  <input type ="file" name="post_img[]" id="post_img" accept="image/*" multiple style="display:none;"></input>

							  <div class="alert alert-success titlealert hide" role="alert" ;>
									尚未輸入標題!
							  </div>

							  <div class="alert alert-success contentalert hide" role="alert" ;>
									尚未輸入內容!
							  </div>

							  <div class="alert alert-success successalert hide" role="alert" ;>
									文章發佈成功!
							  </div>

							  <button type="button" class="btn btn-light">取消</button>
							  <button type="submit" name="submitbtn" id="submitbtn" class="btn btn-light submit-btn" disabled="disabled" >下一步</button>
							 
						</form>	  
						
			</section>	
	   </div>

	 

	    <script src="https://kit.fontawesome.com/a8a43cce47.js" crossorigin="anonymous"></script>
	    <script src="https://cdn.tiny.cloud/1/hxtclvg3mgc7oaicqs2d6dovwxj8yjv5tapovohch15af5no/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"/>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>					 
	    <script src="./Myjs/newpost.js"></script> 