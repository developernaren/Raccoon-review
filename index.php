<?php include ("includes/header.php");  ?> 
<section>
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
                        <option value="asc">Ascending</option>
                        <option value="desc">Descending</option>
                   </select>
                   <select name="ratingSort" id="ratingSort">
                        <option value="highest">Highest</option>
                        <option value="lowest">Lowest</option>
                   </select> 
              </span>       
        </div>
        
        <div class="rac-list">
            <img src="assets/images/Raccoon_Cudjoe_Key_Florida.jpg" alt="Procyan Lator">
            <p>Name : <strong>Raccoon</strong></p>
            <p>Review : <strong>45</strong></p>
            <br>
            <br>
            <br>
            <a href="detail.php?id=4">Detail about Raccon</a>
        </div>
        
        <div class="rac-list">
            <img src="assets/images/Raccoon_Cudjoe_Key_Florida.jpg" alt="Procyan Lator">
            <p>Name : <strong>Raccoon</strong></p>
            <p>Review : <strong>45</strong></p>
            <br>
            <br>
            <br>
            <a href="detail">Detail about Raccon</a>
        </div>
        
        <div class="rac-list">
            <img src="assets/images/Raccoon_Cudjoe_Key_Florida.jpg" alt="Procyan Lator">
            <p>Name : <strong>Raccoon</strong></p>
            <p>Review : <strong>45</strong></p>
            <br>
            <br>
            <br>
            <a href="detail">Detail about Raccon</a>
        </div>
        
        <div class="rac-list">
            <img src="assets/images/Raccoon_Cudjoe_Key_Florida.jpg" alt="Procyan Lator">
            <p>Name : <strong>Raccoon</strong></p>
            <p>Review : <strong>45</strong></p>
            <br>
            <br>
            <br>
            <a href="detail">Detail about Raccon</a>
        </div>
        
        <div class="rac-list">
            <img src="assets/images/Raccoon_Cudjoe_Key_Florida.jpg" alt="Procyan Lator">
            <p>Name : <strong>Raccoon</strong></p>
            <p>Review : <strong>45</strong></p>
            <br>
            <br>
            <br>
            <a href="detail">Detail about Raccon</a>
        </div>
        
        <div class="rac-list">
            <img src="assets/images/Raccoon_Cudjoe_Key_Florida.jpg" alt="Procyan Lator">
            <p>Name : <strong>Raccoon</strong></p>
            <p>Review : <strong>45</strong></p>
            <br>
            <br>
            <br>
            <a href="detail">Detail about Raccon</a>
        </div>
        
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
<script>
    document.getElementById("nameSort").style.display = "inline";

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
</script>

</body>
</html>

