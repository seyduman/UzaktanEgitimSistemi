<div class="header-main">
				
					
				<div class="clearfix">
                                  <div class="dene" align="center">
                    </div>
    </div>
							<div class="clearfix"> </div>
					
						 <div class="header-right">
							<div class="profile_details_left"><!--notifications of menu start -->
								
                            <div class="profile_details">		
								<ul>
											
												
												<div class="user-name">
													<p><?php if(isset($_SESSION['kullaniciAdi'])){ echo $_SESSION['kullaniciAdi'];} else {echo 'Lütfen Giriş Yapınız';} ?></p>
													<span></span>
												</div>
											
									
								</ul>
							</div>		

                                    <?php
                                    
                                    
                                    if(isset($_SESSION['kullaniciAdi'])){
                                $kullanicibak=$_SESSION['kullaniciAdi'];
                                $kullaniciID=$_SESSION['kullaniciID'];
    
                        $host = 'localhost';
                         $user = 'root';
                         $pass = '';
                         $con=mysqli_connect($host, $user, $pass,'phpproject');
                         mysqli_set_charset($con,"utf8");

                        $select2=mysqli_query($con,"select * from kullanici where kullaniciID=$kullaniciID");

                        while($row2=mysqli_fetch_array($select2))
                        {
                            
                            $yetki=$row2['yetki'];
                        }
                        
                    if($yetki=='1'){
                                ?>
                                                <button class="headbuton"><a href="admin.php" >DERSLERİM</a></button>

                                    <?php
                        }
                                    else{
                                        ?>

                                    <?php
                                    }
                                    
                                    ?>
    
                                    <?php
                                    if($kullanicibak=="alp"){
                                        ?>
                                    
                                    
                                   
                                    
                                     <button class="headbuton"><a href="yonetici.php">YÖNETİCİ PANELİ</a></button>
                                    
                                    
                                    <?php
                                    }
                                    }
                                    ?>

								<div class="clearfix"> </div>
							</div>
							<!--notification menu end -->
							<div class="profile_details">
							</div>
											
						</div>
				
				</div>