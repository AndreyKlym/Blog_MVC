
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
  document.write(`
  <li>${animal.type} <span style="color: #1a55cc">${animal.name}</span> 
           is ${animal.age} years old.</li>
           `);
});
document.write('<ol>');

// console.log('qqq');

function printProduct() {
  animals.forEach((animals, ind) => {
      document.write(`
      ${animals.name} ${animals.type} ${animals.age} ind
      `);
    });
  }
printProduct();


animals.forEach(element => console.log(element));

let sortByAge = (a, b) => a.age > b.age ? 1 : -1;
animals.sort(sortByAge); 
// console.log(animals);