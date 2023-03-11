<style>
  .footer-clean {
    padding: 50px 0;
    background-color: black;
    color:whitesmoke;
  }

  .footer-clean h4 {
    margin-top: 5px;
    margin-bottom: 12px;
    font-weight: bold;
    font-size: 16px;
    }

  .footer-clean ul {
    padding: 0;
    /* list-style: none; */
    line-height: 1.6;
    font-size: 14px;
    margin-bottom: 0;
  }

  .footer-clean ul a {
    color: white;
    text-decoration: none;
    opacity: 0.8;
  }

  .footer-clean ul a:hover {
    opacity: 1;
  }
  .footer-clean .item .livraison{
    width: 70%;
    height: 50%;
    background-color: #5FC3E466;
    padding: 20px 30px 0px 30px ;
    margin-left: 30px;
    text-align: center;
    border-radius: 5px ;
    animation: moveToRight 2s ;
    animation-delay: 1000ms;
  }

    @keyframes moveToRight {
      0% {
        transform: translateX(0px);
      }
      100% {
        transform: translateX(100px);
      }
  }


  @media (max-width:767px) {
    .footer-clean .item {
      text-align: center;
      padding-bottom: 20px;
    }
  }

  @media (max-width: 768px) {
    .footer-clean .item.social {
      text-align: center;
    }
  }

  .footer-clean .item.social>a {
    font-size: 24px;
    width: 40px;
    height: 40px;
    line-height: 40px;
    display: inline-block;
    text-align: center;
    border-radius: 50%;
    border: 1px solid #ccc;
    margin-left: 10px;
    margin-top: 5px;
    color: inherit;
    opacity: 0.75;
  }

  .footer-clean .item.social>a:hover {
    opacity: 0.5;

  }

  @media (max-width:991px) {
    .footer-clean .item.social>a {
      margin-top: 40px;
    }
  }

  @media (max-width:767px) {
    .footer-clean .item.social>a {
      margin-top: 10px;
    }
  }

  .footer-clean .copyright {
    margin-top: 14px;
    margin-bottom: 0;
    font-size: 13px;
    opacity: 0.7;
  }
</style>



<footer class="p-5 mt-4  footer-clean" >
  
      <div class="container ">
        <div class="row">
          <div class="col-sm-6 col-md-3">
            <h4>INFORMATIONS</h4>
            <ul>
              <li><a href="profile.php">Informations personnelles</a></li>
              <li><a href="#">Development</a></li>
              <li><a href="#">Hosting</a></li>
            </ul>
            <!-- <h4>About</h4>
            <ul>
              <li><a href="#">Company</a></li>
              <li><a href="#">Team</a></li>
              <li><a href="#">Careers</a></li>
            </ul> -->
          </div>
          <div class="col-md-6 item ">
            <img src="images/OnlyBooksFooter.png" alt="">
            <p>est une bibliothèque électronique qui contient plus de 10 000 livres et dans plus d'une langue à un prix raisonnable et qui expédie dans toutes les villes du Maroc.</p>
            <div class="livraison">
            <h6 style="color: #adadad">Paiement en cash à la livraison ou par carte bancaire</h6>
            <p>Hors Rabat la livraison par AMANA <img class="w-25" src="images/amanaLogo.png"> </p>
            </div>
          </div>
          
          <div class="col mt-3 item social">
          <h4>SUIVEZ-NOUS</h4>
            <a href="#"><i class="bi bi-facebook "></i></a><a href="https://www.instagram.com/only_books_2020/"><i class="bi bi-instagram"></i>
          </a></div>
        </div>
        <p class="copyright text-center">Only_Books©2022</p>
      </div>

</footer>