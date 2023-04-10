const express = require('express');
const http = require('node:http');
const path = require('path');
const io = require('socket.io');
const Route = require('./routes/routes.js');

const app = express();
const server = http.createServer(app);
const socket = io(server)

console.log(Route)

const port = 3000 || process.env.PORT;

server.listen(port, () => {console.log('Server Running')})