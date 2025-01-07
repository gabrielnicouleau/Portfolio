<?php 
session_start();
class ViewIndex{
    public function render(): string{

        ob_start();
?>
        <main>
        <nav id="navigation">
            <a href="#">catégories</a>
            <a href="#">favoris</a>
            <a href="#">contact</a>
        </nav>
        <section>
            <article id="presentation">
            <h1>Bienvenue sur le site Fallout4 - trouve mon item</h1>
            <p>Ce site a pour vocation de vous aider tout au long de votre aventure dans les terres désolées en vous permettant de localiser les armes et équipements uniques disponibles sur le jeu. Connectez vous au site afin d’enregistrer vos objets préférés dans votre liste de favoris afin de conserver votre to-do list à vos cotés lors de votre prochaine session de jeu.</p>
            </article>
            <article id="searching">
            <form>
                <input class="form-control me-1" type="search" placeholder="Votre recherche" aria-label="Search">
                <button class="btn" type="submit">Search</button>
            </form>
            <div>
                <p>Filtres:</p>
            </div>
            <div id="filters">
                <div>
                <button>Armes</button>
                <div>
                    <a href="#">armes de tir</a>
                    <a href="#">armes de mêlée</a>
                </div>
                </div>
                <div>
                <button>Equipements</button>
                <div>
                    <a href="#">tenues</a>
                    <a href="#">pièces d'armure</a>
                </div>
                </div>
            </div>
            </article>
            <!-- template résultats recherche -->
            <!-- <article id="results">
            <ul>
                <li><a href="#">Lorem ipsum dolor sit amet consectetur</a><img src="./design/The_Last_Minute.png" alt="image"></li>
                <li><a href="#">Lorem ipsum dolor sit amet consectetur</a><img src="./design/The_Last_Minute.png" alt="image"></li>
                <li><a href="#">Lorem ipsum dolor sit amet consectetur</a><img src="./design/The_Last_Minute.png" alt="image"></li>
                <li><a href="#">Lorem ipsum dolor sit amet consectetur</a><img src="./design/The_Last_Minute.png" alt="image"></li>
            </ul>
            </article> -->
            <!-- fin template résultats de recherche -->
        </section>
        </main>

        <footer>
        <nav>
            <a href="#">contact</a>
            <a href="#">copyrights</a>
            <a href="#">liens utiles</a>
        </nav>
        </footer>
        
        <div id="app">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script type="module" src="./App/src/script/script.js"></script>
        </div>
    </body>

    </html>
<?php
        return ob_get_clean();
    }
}
?>