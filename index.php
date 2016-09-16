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

    <div class="rac-container">
        <div class="rac-info">
            <span>Total result <strong>: 45</strong> </span>
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
        <?php

       $raccoons = new Racoon();
        $result = $raccoons->getAllRaccoons();
        foreach ($result as  $raccoon)
        {

        ?>
        <div class="rac-list">

            <img src="<?php echo $raccoon->getImageUrl(); ?>" alt="Procyan Lator">
            <p>Name : <strong><?php echo $raccoon->getName(); ?>  </strong></p>
            <p>Review : <strong>45</strong></p>
            <br>
            <br>
            <br>
            <a id="#hrefs" value="<?php echo $raccoon->getId(); ?>" onclick="detail(<?php echo $raccoon->getId(); ?>)">Detail about Raccon</a>
        </div>
        <?php } ?>
        
        <div class="rac-pagination">
                <ul>
                    <span>Showing Per Page <strong>: 10</strong> </span>
                    <span><strong>Pages : </strong></span>
                    <li><a href="">1</a></li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href="">4</a></li>
                    <li><a href="">5</a></li>
                </ul>
        </div>
        

    </div>

</section>

<div id="status"></div>

<div class="detail-container">
   <div class="sum-list">
        <p><strong>Detail</strong> of Raccoon Name</p>
   </div>
   <section class="rac-detail">
            <img src="assets/images/Curious_Raccoon.jpg" alt="">

        <div class="about-rac">
           <p><big><strong>Description </strong></big> </p>
            <p>Name              <strong> = Hello</strong> </p>
            <p>Total Review      <strong> = 45</strong> </p>
            <p>Average Rating    <strong> = 4</strong> </p>
        </div>

    </section>
    <section class="user-review">
        <div class="user-comments">
            <p>User Reviews</p>
        </div>
        <div class="user-rac-rate" id="1">
            <p>Username = <strong>Rabin Bhandari</strong> &nbsp;&nbsp;&nbsp;&nbsp;Rating = <strong>4</strong>
            <select  onchange="changeOption(this)">
                <option value="null">Select Option</option>
                <option value="update">Update</option>
                <option value="delete">Delete</option>
            </select>
            </p>
            <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique aperiam quisquam quibusdam commodi dicta tempore, fugiat. Nobis possimus unde id, fuga, mollitia officiis! Neque labore eum, libero adipisci eligendi vel nostrum iusto in, minima quas ipsa necessitatibus odio, natus deleniti aliquid assumenda facere aut, sequi dolor tempora omnis illum. Rerum eaque, odio!</p>
        </div>

        <div class="user-rac-rate" id="2">
            <p>Username = <strong>Rabinss Bhandari</strong> &nbsp;&nbsp;&nbsp;&nbsp;Rating = <strong>4</strong>
            <select  onchange="changeOption(this)">
                <option value="null">Select Option</option>
                <option value="update">Update</option>
                <option value="delete">Delete</option>
            </select>
            </p>
            <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique aperiam quisquam quibusdam commodi dicta tempore, fugiat. Nobis possimus unde id, fuga, mollitia officiis! Neque labore eum, libero adipisci eligendi vel nostrum iusto in, minima quas ipsa necessitatibus odio, natus deleniti aliquid assumenda facere aut, sequi dolor tempora omnis illum. Rerum eaque, odio!</p>
        </div>

        <div class="user-rac-rate" id="3">
            <p>Username = <strong>RabinGaurab Bhandari</strong> &nbsp;&nbsp;&nbsp;&nbsp;Rating = <strong>4</strong>
            <select  onchange="changeOption(this)">
                <option value="null">Select Option</option>
                <option value="update">Update</option>
                <option value="delete">Delete</option>
            </select>
            </p>
            <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique aperiam quisquam quibusdam commodi dicta tempore, fugiat. Nobis possimus unde id, fuga, mollitia officiis! Neque labore eum, libero adipisci eligendi vel nostrum iusto in, minima quas ipsa necessitatibus odio, natus deleniti aliquid assumenda facere aut, sequi dolor tempora omnis illum. Rerum eaque, odio!</p>
        </div>
        <div class="user-rac-rate" id="4">
            <p>Username = <strong>Rabin Bhandari</strong> &nbsp;&nbsp;&nbsp;&nbsp;Rating = <strong>4</strong>
            <select  onchange="changeOption(this)">
                <option value="null">Select Option</option>
                <option value="update">Update</option>
                <option value="delete">Delete</option>
            </select>
            </p>
            <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique aperiam quisquam quibusdam commodi dicta tempore, fugiat. Nobis possimus unde id, fuga, mollitia officiis! Neque labore eum, libero adipisci eligendi vel nostrum iusto in, minima quas ipsa necessitatibus odio, natus deleniti aliquid assumenda facere aut, sequi dolor tempora omnis illum. Rerum eaque, odio!</p>
        </div>
         <div class="user-rac-rate" id="update-rac">
            <form action="api/api/">
                <p>Username = <input type="text" value="rabin"> &nbsp;&nbsp;&nbsp;&nbsp;Rating  <input type="number" min="1" max="5" value="4" >
                <input type="submit" value="update" >
                <input type="button" onclick="hideUpdate()" value="Cancel">
                </p>
                <p> <textarea name="" id="" cols="30" rows="10"></textarea> </p>
                <input name="method" type="hidden" value="put" >
            </form>
        </div>

    </section>
    <div class="new-review-button" id="mg-section">
        <button onclick="newSection()" id="bt-comment" >Click here to add your new Review</button>
        <div class="user-comment" id="user-comment">
            <form action="api/api" method="post">
                <input type="text" name="username" id="username" placeholder="Your name" required>
                <span>Your Rating &nbsp;&nbsp;&nbsp; </span>
                
                <span class="radio-toolbar">
                    <input type="radio" id="rate1" name="rate" value="1">
                    <label for="rate1">1</label>
                    <input type="radio" id="rate2" name="rate" value="2">
                    <label for="rate2">2</label>
                    <input type="radio" id="rate3" name="rate" value="3">
                    <label for="rate3">3</label>
                    <input type="radio" id="rate4" name="rate" value="4">
                    <label for="rate4">4</label>
                    <input type="radio" id="rate5" name="rate" value="5">
                    <label for="rate5">5</label>
                </span>

                <p>
                <textarea name="" id="" cols="30" rows="10">Hello</textarea>
                </p>
                <div class="button-area" id="comment-box-show">
                    <input type="submit"  value="Post">
                    <input type="button" onclick="hideBox()" id="cancel" value="Cancel">
                </div>

            </form>
        </div>
    </div>
</div>
<script>

    function detail(obj)
    {
       
        var url = baseUrl + "api/raccoon/"+obj;
            $.get(url,function(data,status){
                data = JSON.parse( data );
                console.log( data );
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

    function newSection()
    {
        document.getElementById("bt-comment").style.display = "none";
        document.getElementById("user-comment").style.display = "block";
        window.location.href = "#comment-box-show";
        document.getElementById("username").focus();
    }
    function hideBox()
    {
        document.getElementById("user-comment").style.display = "none";
        document.getElementById("mg-section").style.textAlign = "center";
        document.getElementById("bt-comment").style.display = "block";

    }
    function changeOption(obj)
    {
        var option = obj.value;
        switch (option) {
            case "update":
                document.getElementById("bt-comment").style.display = "none";
                document.getElementById("user-comment").style.display = "none";
                document.getElementById("3").style.display = "none";
                document.getElementById("update-rac").style.display = "block";

                break;
            case "delete":
                    var txt;
                    var r = confirm("Are u sure want to delete this review ?");
                    if (r == true) {
                        txt = "You pressed OK!";
                    } else {
                        txt = "You pressed Cancel!";
                        document.getElementById("bt-comment").style.display = "block";
                        document.getElementById("3").style.display = "block";
                        document.getElementById("update-rac").style.display = "none";
                 break;
                    }
                    document.getElementById("demo").innerHTML = txt;

                break;
            case "null" :
                document.getElementById("3").style.display = "block";
                document.getElementById("update-rac").style.display = "none";
                 break;
            default:
                break;
        }

    }

    function hideUpdate()
    {
        document.getElementById("bt-comment").style.display = "block";
        document.getElementById("3").style.display = "block";
        document.getElementById("update-rac").style.display = "none";
    }
</script>

</body>
</html>

