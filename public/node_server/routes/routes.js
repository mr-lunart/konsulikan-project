const express = require('express')
const router = express.Router()

const test = router.get('/', (req, res) => {
    res.send('TESTING')
})

class Routers {
    constructor(){};
    login(){

        router.get('/', (req, res ) => {
            res.send(' Test ')
        });

    }
}

// const Route = new Routers() 

module.exports = test;

