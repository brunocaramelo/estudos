import express from 'express';

const router = express.Router();

router.get('/', (req, res) => { 
    return res.json({ 
        msg: 'Another router wihout graphql - School of net' 
    });
});

export default router;