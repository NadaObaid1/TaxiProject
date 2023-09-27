import express from 'express'
import * as messageController from "./Message.controller.js"
const app = express()

app.get("/", messageController.getMessage);

export default app;