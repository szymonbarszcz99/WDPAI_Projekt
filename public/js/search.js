const search = document.querySelector('input[placeholder="Search_city"]');
const bookstoreContainer = document.querySelector(".result");

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};
        console.log(JSON.stringify(data));
        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (bookstores) {
            bookstoreContainer.innerHTML = "";
            loadBookstores(bookstores)
        });
    }
});

function loadBookstores(bookstores) {
    bookstores.forEach(bookstore => {
        createBookstore(bookstore);
    });
}

function createBookstore(bookstore) {
    const template = document.querySelector("#template");

    const clone = template.content.cloneNode(true);
    const form = clone.querySelector("form")
    form.action='/BookstoreInfo?id='+bookstore.id;
    const button=clone.querySelector('button[name="id"]');
    button.value=bookstore.id;
    photos=bookstore.photos.split(",")[0];
    const image = clone.querySelector("img");
    image.src = "/public/uploads/"+photos;
    const title = clone.querySelector("h1");
    title.innerHTML = bookstore.name;
    const description = clone.querySelector("article");
    description.innerHTML = bookstore.description;
    const address = clone.querySelector("p");
    address.innerHTML = bookstore.address;
    const rate=clone.querySelector(".rate");
    for(i=0;i<5;i++){
        newI=document.createElement("i");
        newI.className="material-icons";
        newI.style.display="inline";
        if(i<bookstore.rate){
            newI.innerText="star_rate";
        }
        else{
            newI.innerText="star_border";
        };
        rate.appendChild(newI);
    }

    bookstoreContainer.appendChild(clone);
}
