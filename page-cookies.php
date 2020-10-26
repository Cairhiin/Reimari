<?php
/**
 * Cookies page template
 *
 * @package reimari
 */
get_header(); ?>

	<main class="container-fluid article-front HP-page-bar" id="main">       
        <div class="container">     
          <div class="row cookies-disclaimer"> 
            <div class="col-md-4"> 
              <?php
                $myImagesDir = get_bloginfo('url').'/wordpress/wp-content/themes/reimari/images/';
                $image = $myImagesDir . "gdpr.jpg";
              ?>
              <img src="<?php echo $image ?>" alt="GDPR" />
            </div>
            <div class="col-md-8"> 
              <h2>Reimarin kotisivu käyttää evästeitä tiedonkeruuseen</h2>
              <p>
                Reimari hyödyntää kolmansien osapuolten evästeitä päivittäisten kävijöiden ja suositun sisällön tarkkailuun. Keräämämme tieto ei sisällä henkilökohtaista tai arkaluonteista tietoa, kuten nimiä tai sähköpostiosoitteita, eikä tietoa käytetä markkinointiin. Keräämme tietoa mm. käytetystä selaimesta, käyttöjärjestelmästä, sivulla vietetystä ajasta sekä vierailluista sivuista. Nämä evästeet ovat anonyymejä, eikä yksittäisiä kävijöitä seurata.
              </p>
              <p>
                Käyttämämme kolmansien osapuolten evästeet:
                <ul>
                  <li>
                    Google Analytics - analytiikka
                  </li>
                  <li>
                    Facebook - kommentointi
                  </li>
                  <li>
                    AddThis - sosiaalisen median jakotoiminnot ja analytiikka
                  </li>
                </ul>  
              </p>
            </div>
          </div><!-- /.row -->
        </div><!-- /.container -->
        </main>
      

<?php get_footer(); ?>