db.RestaurantTests.find()
db.RestaurantTests.find({}, { restaurant_id: 1, name: 1 })
db.RestaurantTests.find({}, { restaurant_id: 1, name: 1, borough: 1, cuisine: 1 })
db.RestaurantTests.find({}, { restaurant_id: 1, name: 1, borough: 1, "address.zipcode": 1 })
db.RestaurantTests.find({ borough: "Bronx" })
db.RestaurantTests.find({ borough: "Bronx" }).limit(5)
db.RestaurantTests.find({ borough: "Bronx" }).skip(5).limit(5)
db.RestaurantTests.aggregate([{ $addFields: { totalScore: { $sum: "$grades.score" }}}, { $match: { totalScore: { $gt: 90 }}}, { $project: { name: 1, borough: 1, cuisine: 1, totalScore: 1}}])
db.RestaurantTests.aggregate([{ $addFields: { totalScore: { $sum: "$grades.score" }}}, { $match: { totalScore: { $gt: 90 }}}, { $match: { totalScore: { $lt: 100 }}}, { $project: { name: 1, borough: 1, cuisine: 1, totalScore: 1 }}]) 
// Trobar els restaurants amb longitud menor que -95.754168
db.RestaurantTests.find({ cuisine: { $ne:  "American" }}, { restaurant_id: 1, name: 1, borough: 1, cuisine: 1 })
// El mateix que l'anterior però sense usar operador $and find( $expr: { $gt: ["valor 1 a comparar con 2", "valor 2" ]})
// Trobar restaurants que no són 'American', grau 'A', i no són de Brooklyn. Ordenats per cuisine descendent
db.RestaurantTests.find({ name: /^Wil/ }, { restaurant_id: 1, name: 1, borough: 1, cuisine: 1})
db.RestaurantTests.find({ name: /ces$/ }, { restaurant_id: 1, name: 1, borough: 1, cuisine: 1})
db.RestaurantTests.find({ name: /.*Reg.*/ }, { restaurant_id: 1, name: 1, borough: 1, cuisine: 1})
db.RestaurantTests.find({ $and: [{ $or: [{ cuisine: "American"}, { cuisine: "Chinese" }] }, { borough: "Bronx" }]}, { name: 1, borough: 1, cuisine: 1})
db.RestaurantTests.find({ $or: [{ borough: "Staten Island"}, { borough: "Queens"}, { borough: "Bronx"}, { borough: "Brooklyn"}]}, { restaurant_id: 1, name: 1, borough: 1, cuisine: 1})
db.RestaurantTests.find({ $nor: [{ borough: "Staten Island"}, { borough: "Queens"}, { borough: "Bronx"}, { borough: "Brooklyn"}]}, { restaurant_id: 1, name: 1, borough: 1, cuisine: 1})
// Trobar restaurant_id, name, borough i cuisine amb marcador no superior a 10.
// Trobar restaurants que preparen peix, no 'American' ni 'Chinees', o nom comença amb 'Wil'.
// Trobar restaurant_id, name, i grades per grau "A", score 11, i data "2014-08-11T00:00:00Z"
// Trobar restaurant_id, name i grades on el 2n element té grau "A", score 9 i data "2014-08-11T00:00:00Z"
// Trobar el restaurant_id, name, street, zipcode i coordenades dels restaurants a menys de 5 km de [-74, 40.7]
db.RestaurantTests.find({ }).sort({ name: 1})
db.RestaurantTests.find({ }).sort({ name: -1})
db.RestaurantTests.find({ }).sort({ cuisine: 1, borough: -1})
RestaurantDB> db.RestaurantTests.find({ "address.street": null }, { name: 1, address: 1})
// Seleccionar documents on el valor de coordinate és de tipus Double. Mostrar el name, restaurant_id i coordinades
// Mostrar restaurant_id, name i grade per restaurants amb marcador divisible per 7 (resta 0)
db.RestaurantTests.find({ name: /.*mon.*/ }, { name: 1, borough: 1, "location.coordinates": 1, cuisine: 1})
// Mostrar restaurant_id, name i grade i score de més de 80 però menys que 100