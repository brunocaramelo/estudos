import express from 'express';
import bodyParser from 'body-parser';
import expressGraphQL from 'express-graphql';
import mongoose from 'mongoose';
import routes from './routes/index.js';
import Schema from './graphql/index.js';

const app = express();

app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());
app.use('/graphql', expressGraphQL({
    schema: Schema,
    // schema: buildSchema(`type Query { msg: String }`),
    // rootValue: { msg: () => 'Hello world 1231321321312' },
    graphiql: true,
    pretty: true
}));

mongoose.connect('mongodb://database:27017/graphql', { useNewUrlParser: true });

routes(app);

app.listen(3000, () => console.log('Express has been started'));