import express from 'express'
import * as UserController from "./User.controller.js"
import { auth } from '../../MidelWare/Auth.MidelWare.js';
const app = express()

app.get("/",auth, UserController.profile);

export default app;