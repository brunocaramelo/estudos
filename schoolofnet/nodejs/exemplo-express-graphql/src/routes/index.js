import home from './home/index.js';

export default (app) => {
    app.use('/', home);
};