export const asynHandler = (fn)=> {
    return (req,res,next) => {
        fn(req,res).catch((error)=>{
            return res.json({message: "catch error", error: error.stack})
        })
    }
}