
cd schoolofnet/nodejs/exemplo-express-graphql
docker-compose up


http://localhost:3000/graphql

GET

{
    people{
        name  
    }
}


POST

mutation {
  createPerson(person:{name:"MAOOE2"}),
  {id,name}
}