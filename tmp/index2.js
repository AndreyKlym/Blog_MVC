
var usersArr = [ 
  {username: 'Jan Kowalski',      birthYear: 1983, salary: 4200}, 
  {username: 'Anna Nowak',        birthYear: 1994, salary: 7500}, 
  {username: 'Jakub Jakubowski',  birthYear: 1985, salary: 18000}, 
  {username: 'Piotr Kozak',       birthYear: 2000, salary: 4999}, 
  {username: 'Marek Sinica',      birthYear: 1989, salary: 7200}, 
  {username: 'Kamila Wiśniewska', birthYear: 1972, salary: 6800}, 
]; 

function staffListResult() {
  document.write(`<h2>Zadanie 2 (JavaScript)</h2> `);

  usersArr.forEach((employe) => {
    var calculated_year_age = 0; 
    var date = new Date();
    var yearCurr = date.getFullYear();

    if (employe.salary >= 15000 ){
      document.write(` <p> Hello CEO!</p> `);
    } else if (employe.salary <= 5000 ){
      document.write (`<p> ${employe.username}, get ready for a raise! </p>`);
    }
    
    calculated_year_age = yearCurr - employe.birthYear;
    if (calculated_year_age %2== 0 ){
      document.write (`<p> Hello, ${employe.username}! This year you are turning ${calculated_year_age}  years! </p>`);
    } else {
      document.write (` <p> ${employe.username}, you are fired! </p>`);
    }

  });
}
staffListResult();
