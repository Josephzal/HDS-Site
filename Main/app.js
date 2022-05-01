const express = require('express');
const res = require('express/lib/response');
const session = require('express-session');

var app = express();

// set the view engine to ejs
app.set('view engine', 'ejs');

app.use( express.static( "public" ) );

// app.use(session({ secret: 'somevalue' }))

// // Session Object to setup sessions and cookies
// const sessionConfig = {
//   name: 'session',
//   cookie: {
//       httpOnly: true,
//       //secure: true,
//       expires: Date.now() + 1000 * 60 * 60 * 24 * 7,
//       maxAge: 1000 * 60 * 60 * 24 * 7
//   }
// }
// // Must come before passport.session
// app.use(session(sessionConfig));

// app.use(function(req, res, next) {
//   req.session.logins = '0';
//   next();
// });

// use res.render to load up an ejs view file

// index page
app.get('/', function(req, res) {
  res.render('pages/index');
});

// about page
app.get('/about', function(req, res) {
  res.render('pages/about');
});

app.get('/services', function(req, res) {
    res.render('pages/services');
});

app.get('/products', function(req, res) {
    res.render('pages/products');
});

app.get('/employee', function(req, res) {
    res.render('pages/employee');
});

app.get('/locations', function(req, res) {
    res.render('pages/locations');
});

app.get('/appliances', function(req,res) {
  res.render('pages/appliances')
}) 

app.get('/cabinets', function(req, res) {
  res.render('pages/cabinets');
});

app.get('/lighting', function(req, res) {
  res.render('pages/lighting');
});

app.get('/sinks', function(req, res) {
  res.render('pages/sinks');
});

app.get('/tile', function(req,res) {
  res.render('pages/tile');
})

app.get('/inventory', function(req,res) {
  res.render('pages/inventory');
})

app.get('/statements', function(req,res) {
  res.render('pages/statements');
})

app.get('/customerReports', function(req,res) {
  res.render('pages/customerReports');
})

app.get('/employeeReports', function(req,res) {
  res.render('pages/employeeReports');
})

app.get('/productsReports', function(req,res) {
  res.render('pages/productsReports');
})

app.get('/salesReports', function(req,res) {
  res.render('pages/salesReports');
})

app.get('/receipt', function(req, res) {
  res.render('pages/receipt')
})

app.listen(3000);
console.log('Server is listening on port 3000');


