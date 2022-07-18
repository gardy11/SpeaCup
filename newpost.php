<br/><br/><br/><br/><br/><br/><br/><br/>
      <div class="wrapper">
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
									<a class="dropdown-item" href="#" value="1" >演藝</a>
									<a class="dropdown-item" href="#" value="2" >美食</a>
									<a class="dropdown-item" href="#" value="3" >電影</a>
									<a class="dropdown-item" href="#" value="4" >遊戲</a>
									<a class="dropdown-item" href="#" value="5" >心情</a>
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
							  <textarea rows="1" type ="text" name="title" id="autoresizing" spellcheck="false" class="input-field input-title" placeholder="標題" style="position:relative; top:5px; overflow:hidden; border:none; outline:none; width:540px; font-size:30px;"></textarea><br /><br />
							  
							  
							  <textarea contenteditable name="content" id="input-content" class="input-field input-content" spellcheck="false" placeholder="內容..." 
							  style="position:relative; top:2px; resize:none; overflow-y:auto; border:none; outline:none; height: 400px; width:540px;"></textarea>
							  

							  <!-- <div contenteditable="true" name="content" id="input-content" class="input-field input-content" placeholder="內容..." style="position:relative; top:2px; resize:none; overflow:hidden;  border:none; outline:none; height: 400px; width:540px;"><img contenteditable="false" style="max-width:540px" id="myimg" /></div> -->

							  <!-- <div contenteditable="true" data-placeholder="(內容...)" class="input-content" name="content" id="input-content"   
							  style="position: relative; flex: 1 1 0%; line-height: 22px; font-size: 16px; 
							  outline: none; border: none; word-break: break-word; height: 400px; width:540px;"></div> -->
							  <!-- <div data-dcard-editor-index="0"><div style="caret-color: transparent;">
							  <div class="sc-ce377132-0 btqnSF"><div class="sc-ce377132-6 fRnKqK"> -->
								

							  <!-- <div id="textarea" contenteditable>
								<img contenteditable="false" style="width:45px" id="myimg" />
								I look like a textarea

								</div> -->

								<!-- <div id="textarea" contenteditable>
								<img contenteditable="false" style="max-width:540px" id="myimg" />
								I look like a textarea

								</div> -->

							  <br/><br/>	
							  <!-- <label for = "post_img">
							  <i class="fa-solid fa-image" style="cursor:pointer;"></i>
							  </label> -->
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





