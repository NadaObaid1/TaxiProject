import express from 'express'
import * as AuthController from "./Auth.controller.js"
import {asynHandler} from "../../MidelWare/errorHandler.js"
import validation from "../../MidelWare/Validation.js"
import {SignInSchema} from  "./Auth.Vaildation.js"
import {SignUpSchema} from  "./Auth.Vaildation.js"
const app = express()

app.post("/signup", validation(SignUpSchema), asynHandler(AuthController.SignUp));
app.post("/signin",validation(SignInSchema) ,asynHandler(AuthController.SignIn));
app.get("/confirmEmail/:token", asynHandler(AuthController.confirmEmail))
app.get("/NewconfirmEmail/:Refreshtoken", asynHandler(AuthController.NewconfirmEmail))

export default app;