const axios = require("axios").default;

const movies = require("./movies_series_2");

async function saveMovies() {
    for (let movie of movies) {
        try {
            await axios.post("http://localhost:8000/api/movie", movie);
            console.log("Pelicula insertada exitosamente: ", movie.name);
        } catch (err) {
            console.log("No se pudo insertar la pelicula ", movie.name);
            console.log(err);
        }
    }
}

saveMovies();
