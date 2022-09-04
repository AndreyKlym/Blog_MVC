let animals = [ 
    { name: 'Vasya', type: 'Cat', age: 4},
    { name: 'Murka', type: 'Cat', age: 1.5 },
    { name: 'Varna', type: 'Turtle', age: 21 },
    { name: 'Kesha', type: 'Parrot', age: 3 },
    { name: 'Nayda', type: 'Dog', age: 2.5 },
    { name: 'Pufic', type: 'Humster', age: 2.2 },
    { name: 'Randy', type: 'Dog', age: 12 },
];
document.write('<ol start="0">');
animals.forEach( animal => {
  document.write(`<li>${animal.type} <span style="color: #1a55cc">${animal.name}</span> 
           is ${animal.age} years old.</li>`);
});
document.write('<ol>');

// console.log('qqq');

function printProduct() {
    document.write(`<div class="container text-center">
    <h2 class="text-success my-4">Вывод продуктов на экран</h2>
    <div class="row">`);
    food.forEach((product, ind) => {
      document.write(`<div class="col-lg-3 col-md-4 col-sm-6 mb-3">
      <div class="card border-success">
          <img src="${product.img}" alt="${product.name}" class="img-fluid">
          <div class="card-title pt-2 bg-success text-white">
              <h3 class="text-=success"><span class="badge badge-light">${ind}</span>&nbsp; ${product.name}</h3>
          </div>           
          <div class="card-body">                                 
              <div class="card-text weight">${product.weight} г</div>
              <div class="card-text price">${product.price} грн.</div>
          </div>
        </div>
      </div>`);
    });
    document.write(`</div></div>`);
  }
printProduct();

// ${animals.name} ${animals.type} ${animals.age} 


let sortByAge = (a, b) => a.age > b.age ? 1 : -1;
animals.sort(sortByAge); 
console.log(animals);