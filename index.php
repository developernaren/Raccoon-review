<?php
    require_once "api/classes/Db.php";
    require_once "api/classes/Racoon.php";
    include ("includes/header.php");
?>
<section class="main-item">

    <!-- About Raccoons   -->
	<div class="about-rac">
		<div class="about-rac-para">
            <h2>Reccoon</h2>
                <p>
                    The word "raccoon" was adopted into English from the native Powhatan term, as used in the Virginia Colony. It was recorded on Captain John Smith's list of Powhatan words as aroughcun, and on that of William Strachey as arathkone.It has also been identified as a Proto-Algonquian root *ahrah-koon-em, meaning  one who rubs, scrubs and scratches with its hands".

                    Similarly, Spanish colonists adopted the Spanish word mapache from the Nahuatl mapachitli of the Aztecs, meaning  one who takes everything in its hands".In many languages, the raccoon is named for its characteristic dousing behavior in conjunction with that language's term for bear, for example Waschbär in German, orsetto lavatore in Italian, mosómedve in Hungarian and araiguma (アライグマ) in Japanese. In French and European Portuguese, the washing behavior is combined with these languages' term for rat, yielding, respectively, raton laveur and ratão-lavadeiro. The raccoon's scientific name, Procyon lotor, is neo-Latin, meaning "before-dog washer", with lotor Latin for "washer" and Procyon Latinized Greek from προ-, "before" and κύων, "dog".

                    The colloquial abbreviation coon is used in words like coonskin for fur clothing and in phrases like old coon as a self-designation of trappers.In the 1830s, the U.S. Whig Party used the raccoon as an emblem, causing them to be pejoratively known as 'coons' by their political opponents, who saw them as too sympathetic to African-Americans. Soon after that it became an ethnic slur,[14] especially in use between 1880 and 1920 (see coon song), and the term is still considered offensive.

                    The original habitats of the raccoon are deciduous and mixed forests, but due to their adaptability they have extended their range to mountainous areas, coastal marshes, and urban areas, where some homeowners consider them to be pests. As a result of escapes and deliberate introductions in the mid-20th century, raccoons are now also distributed across mainland Europe, Caucasia, and Japan.

                </p>
		</div>
		<div class="about-rac-image">
            <figure>
                <img src="assets/images/Raccoon_(Procyon_lotor)_2.jpg" alt="Raccoon Name">
                <figcaption>Procyon Lotor</figcaption>
			</figure>
		</div>
	</div>

    <!-- Main Raccoons contents with sorting  -->
<div id="status"></div>

    <div class="rac-container">
        <div class="rac-info">
            <span>Total result <strong>: <?php

                $raccoons = new Racoon();

                $total_result = $raccoons->getTotal();
                $total = $raccoons->total;
                echo $total;

            ?></strong> </span>
                <span>
                   Sort By :
                   <select id="sort_option" onchange="myOptions()">
                        <option value="name">Name</option>
                        <option value="rating">Rating</option>
                   </select>
                   <select name="nameSort" id="nameSort">
                        <option value="asc" id="asc">Ascending</option>
                        <option value="desc" id="desc">Descending</option>
                   </select>
                   <select name="ratingSort" id="ratingSort">
                        <option value="highest" id="highest">Highest</option>
                        <option value="lowest" id="lowest">Lowest</option>
                   </select>
              </span>
        </div>
        
        <div id="new-list">
        
            
        </div>
        
        <div class="php-loop">
        <?php

        $result = $raccoons->getAllRaccoons();

        foreach ($result as  $raccoon)
        {

        ?>

        <div class="rac-list" id="first-rac">

            <img src="<?php echo $raccoon->getImageUrl(); ?>" alt="Procyan Lator">
            <p>Name : <strong><?php echo $raccoon->getName(); ?>  </strong></p>
            <p>Review : <strong>
            <?php 
                $total_result = $raccoons->getTotalReview( $raccoon->getId());
                echo $total_result['total_review'];
                
             ?></strong></p>
            <br>
            <br>
            <br>
            <a id="#hrefs" value="<?php echo $raccoon->getId(); ?>" onclick="detail(<?php echo $raccoon->getId(); ?>)">Detail about Raccon</a>
        </div>
        <?php } ?>

        </div>

    </div>

</section>

<div class="detail-container">
   
     <div class="sum-list">
     </div>   
  
   <section class="rac-detail">
            <img id="racoon-img" src="" alt="">

        <div class="about-racs">
           
        </div>

    </section>
    <section class="user-review">
        <div class="user-comments">
            
        </div>
        <div id="review-wrapper-div"></div>

         <div class="user-rac-rate" id="update-rac">
                 
        </div>

    </section>
    <div class="new-review-button" id="mg-section">


        <div class="button">
        
        </div>
        <div class="user-comment" id="user-comment">
            
                <input type="text" name="username" id="username" placeholder="Your name" required>
                <span>Your Rating &nbsp;&nbsp;&nbsp; </span>
                
                <span class="radio-toolbar">
                    <select id="rate-value">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </span>
                &nbsp; &nbsp; &nbsp; &nbsp; 
                <span>Your key &nbsp; &nbsp; <input type="number" id="user-number" placeholder="your secrete key "> &nbsp; &nbsp; &nbsp; <big style="color:red;">*</big> length of key is 4</span>

                <p>
                <textarea id="review-text" cols="30" rows="10"></textarea>
                </p>
                <div class="button-area" id="comment-box-show">
                    <input type="submit" onclick="ajax_posts()" value="Post">
                    <input type="button" onclick="hideBox()" id="cancel" value="Cancel">
                </div>

        </div>
    </div>
</div>
<script>

    $(".rac-container .rac-info #nameSort #asc").click(function () {

                $(".php-loop").hide();
                var url = baseUrl + "api/raccoon/sortByAsc";
                $.get(url,function(data,status)
                {
                    var data = JSON.parse( data );
                    var asc = '';

                    $.each( data, function(key,datas) {
                        asc += '<div id="new-rac-list" class="rac-list">';
                        asc += '<img src="'+ datas.imageUrl +'" alt="'+ datas.name +'" >';
                        asc += '<p>Name : <strong>'+ datas.name +'</strong></p>';
                        asc += '<p>Review : <strong>45</strong></p>';
                        asc += '<br><br><br>';
                        asc += '<a id="#hrefs" value="'+ datas.id +'" onclick="detail('+ datas.id +')">Detail about Raccon</a>'; 
                        asc += '</div>';

                        

                })

                    $("#new-list").html( asc );

                });

    });

    // Descending 
    
    $(".rac-container .rac-info #nameSort #desc").click(function () {

                $(".php-loop").hide();
                var url = baseUrl + "api/raccoon/getBySortByDesc";
                $.get(url,function(data,status)
                {
                    var data = JSON.parse( data );
                    var asc = '';

                    $.each( data, function(key,datas) {
                        asc += '<div id="new-rac-list" class="rac-list">';
                        asc += '<img src="'+ datas.imageUrl +'" alt="'+ datas.name +'">';
                        asc += '<p>Name : <strong>'+ datas.name +'</strong></p>';
                        asc += '<p>Review : <strong>45</strong></p>';
                        asc += '<br><br><br>';
                        asc += '<a id="#hrefs" value="'+ datas.id +'" onclick="detail('+ datas.id +')">Detail about Raccon</a>'; 
                        asc += '</div>';
                })

                   $("#new-list").html( asc );

                });

    });


    // Highest Rating
    
    $(".rac-container .rac-info #ratingSort #highest").click(function () {

                $(".php-loop").hide();
                var url = baseUrl + "api/raccoon/getByRateHigh";
                $.get(url,function(data,status)
                {
                    var data = JSON.parse( data );
                    var asc = '';

                    $.each( data, function(key,datas) {
                        asc += '<div id="new-rac-list" class="rac-list">';
                        asc += '<img src="'+ datas.imageUrl +'" alt="'+ datas.name +'" >';
                        asc += '<p>Name : <strong>'+ datas.name +'</strong></p>';
                        asc += '<p>Review : <strong>45</strong></p>';
                        asc += '<br><br><br>';
                        asc += '<a id="#hrefs" value="'+ datas.id +'" onclick="detail('+ datas.id +')">Detail about Raccon</a>'; 
                        asc += '</div>';
                })

                    $("#new-list").html( asc );

                });

    });


    // Lowest
    
    $(".rac-container .rac-info #ratingSort #lowest").click(function () {

                $(".php-loop").hide();
                var url = baseUrl + "api/raccoon/getByRateLow";
                $.get(url,function(data,status)
                {
                    var data = JSON.parse( data );
                    var asc = '';

                    $.each( data, function(key,datas) {
                        asc += '<div id="new-rac-list" class="rac-list">';
                        asc += '<img src="'+ datas.imageUrl +'" alt="'+ datas.name +'" >';
                        asc += '<p>Name : <strong>'+ datas.name +'</strong></p>';
                        asc += '<p>Review : <strong>45</strong></p>';
                        asc += '<br><br><br>';
                        asc += '<a id="#hrefs" value="'+ datas.id +'" onclick="detail('+ datas.id +')">Detail about Raccon</a>'; 
                        asc += '</div>';
                })

                    $("#new-list").html( asc );

                });

    });


    function detail(obj)
    {
       
        var url = baseUrl + "api/raccoon/"+obj;
            $.get(url,function(data,status){
                var data = JSON.parse( data );
                data = JSON.parse( data );
               

               // Rating 
               // (252*5 + 124*4 + 40*3 + 29*2 + 33*1) / (252 + 124 + 40 + 29 + 33)
               // 
               
               $("#racoon-img").attr( 'src', data.imageUrl );

                // description
                var description = '';
                description +='<p><big><strong>Description </strong></big> </p>';
                description +='<p>Name              <strong> = '+ data.name +'</strong> </p>';
                description +='<p>Total Review      <strong>7</strong> </p>';
                description += '<p>Average Rating    <strong> = 4</strong> </p>';
                $(".about-racs").html( description );

                // User comments 
                
                var comments = '<p>User Reviews</p>';
                $(".user-comments").html( comments );


                // Description
                var detail = '<p><strong>Detail</strong> of '+ data.name +'</p>';
                $(".sum-list").html( detail );

                // Button
                var button = '<button onclick="newSection('+ data.id +')" id="bt-comment" >Click here to add your new Review</button>';
                $(".button").html( button );

                var html = '';
                $.each( data.reviews, function( key, review ) {

                    
                    html += '<div class="user-rac-rate" id="2">';
                    html += '<p>Username = <strong>' + review.name + '</strong> &nbsp;&nbsp;&nbsp;&nbsp;Rating = <strong>'+ review.rating +'</strong>';
                    html += '<select '
                    html += 'data-id="' + review.id + '"';
                    html += ' onchange="changeOption(this,'+review.id+')">';
                    html += '<option value="null">Select</option>';
                    html += '<option value="update">Update</option>';
                    html += '<option value="delete">Delete</option>';
                    html += '</select>';
                    html += '</p><p>';
                    html += review.reviewText;
                    html += '</p></div>';


                })
                


                $("#review-wrapper-div").html( html );
            });

    }

    document.getElementById("nameSort").style.display = "inline";

    $("#rac-list a").click(function(event) {
            var addressValue = $(this).attr("href");
            alert(addressValue );
    });

    function myOptions() {
        var user_option = document.getElementById("sort_option").value;
        switch (user_option) {
        case "name":
            document.getElementById("nameSort").style.display = "inline";
            document.getElementById("ratingSort").style.display = "none";
            break;
        case "rating":
            document.getElementById("nameSort").style.display = "none";
            document.getElementById("ratingSort").style.display = "inline";
            break;
        }
    }

    function newSection( id )
    {
        document.getElementById("bt-comment").style.display = "none";
        document.getElementById("user-comment").style.display = "block";
        window.location.href = "#comment-box-show/"+id;
        document.getElementById("username").focus();
    }

    // Insert commetst
    
    function ajax_posts() {

        var username = document.getElementById("username").value;
        var cmt = document.getElementById("review-text").value;
        var rate = document.getElementById("rate-value").value;
        var key_length = document.getElementById("user-number").value.length;
        if( key_length != 4) {
            alert( "length must be 4 numbers " );
            return false;
        }


        var s_user_key  = document.getElementById("user-number").value;

        $.ajax({
                url : baseUrl + "api/review/insert",
                type : "post",
                data : {
                    username : username,
                    cmt : cmt,
                    rate : rate,
                    s_user_key : s_user_key,
                    id : id
                },
                success : function( response ) {

                     
                }
            });

    }

    function hideBox()
    {
        document.getElementById("user-comment").style.display = "none";
        document.getElementById("mg-section").style.textAlign = "center";
        document.getElementById("bt-comment").style.display = "block";
        window.location.href = "http://localhost/Raccoon-review/"; 

        $.ajax({
                url: "http://localhost/Raccoon-review/",
                success: function (result) {
                    
                    $(".main-item").html(result);
                }
            });

    }
    function changeOption(obj,id)
    {
        var option = obj.value;

        switch (option) {

            case "update":


                document.getElementById("bt-comment").style.display = "none";
                document.getElementById("user-comment").style.display = "none";

                var update = ' ';
                update += '<p>Username = <input type="text" id="update-username" value="">';
                update += '&nbsp;&nbsp;&nbsp;&nbsp;Rating';
                update += '<input type="number" min="1" max="5" id="update-rate" value="3" >';
                update += '&nbsp; &nbsp;<input type="number" id="update-key" placeholder="your key"  style="width:105px;">';
                update += '<input type="submit" onclick="final_update()" value="update" >';
                update += '<input type="button" onclick="hideUpdate()" value="Cancel"></p>';
                update += '<p><textarea  id="update-text" cols="30" rows="10"></textarea> </p>';

                document.getElementById("update-rac").style.display = "block";
                $("#update-rac").html(update);
                break;

            case "delete":
                    var txt;
                    var r = confirm("Are u sure want to delete this review ?");
                    if (r == true) {
                        
                        document.getElementById("update-rac").style.display = "none";
                        var user_key = prompt("Enter your key", "Your key");
                        if( !isNaN(user_key) && !(user_key == null) && ( user_key.length == 4) ) {


                        $.ajax({
                            url : baseUrl + "api/review/" + user_key,
                            type : "delete",

                            success : function( response ) {
                                alert("Succesffully Deleted ! ");
                            }
                        });

                        } else {
                            alert( "string, null, less less than or greater that 4 length number can't be accepted !" );
                            return false;
                        }

                    } else {
                        txt = "Comments not deleted !";
                        alert( txt );
                        document.getElementById("bt-comment").style.display = "block";
                        document.getElementById("update-rac").style.display = "none";
                 break;
                    }
                    document.getElementById("demo").innerHTML = txt;

                break;
            case "null" :
                document.getElementById("update-rac").style.display = "none";
                document.getElementById("user-comment").style.display = "none";
                document.getElementById("bt-comment").style.display = "block";      
                 break;
            default:
                break;
        }

    }

    // Update function 
    function final_update() {
        var update_name = document.getElementById("update-username").value;
        var update_rate = document.getElementById("update-rate").value;
        var update_text = document.getElementById("update-text").value;
        var update_userkey = document.getElementById("update-key").value;

        $.ajax({
                url : baseUrl + "api/review/update",
                type : "put",
                data : {
                    update_name : update_name,
                    update_rate : update_rate,
                    update_text : update_text,
                    update_userkey : update_userkey
                },
                success : function( response ) {

                     
                }
            });

    }

    function hideUpdate()
    {
        document.getElementById("bt-comment").style.display = "block";
        document.getElementById("update-rac").style.display = "none";
    }
</script>

</body>
</html>

