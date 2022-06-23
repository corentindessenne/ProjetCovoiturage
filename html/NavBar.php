
    <nav>
        <div class="logo">
            <a href="home.php"><img src="../images/LBR Ressources/logoLONGUEURClassic.png"></a>
        </div>  
        <ul class="nav-links">
            <li>
                <a href="TousLesTrajets.php">Les trajets</a>
            </li>
            <li>
                <a href="register.php">S'inscrire</a>
            </li>
            <li>
               <a href="login.php">Se connecter</a>
            </li>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>   
        </div>
    </nav>

<script type="text/javascript">


const navSlide = () =>{
const burger = document.querySelector('.burger');
const nav = document.querySelector('.nav-links');
const navLinks = document.querySelectorAll('.nav-links li')


burger.addEventListener('click', () =>{
    nav.classList.toggle('nav-active')


    navLinks.forEach((link,index) =>{
    if (link.style.animation) {
        link.style.animation = '';
    } else{
        link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.3}s`
    }

});

    burger.classList.toggle('toggle');
});
}



navSlide(); 

</script>

</html>