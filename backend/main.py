from config import general_settings
from fastapi import FastAPI, HTTPException
from pydantic import BaseModel
from pymongo import MongoClient
from dotenv import load_dotenv
import uvicorn
from fastapi.middleware.cors import CORSMiddleware
from routes import router

app = FastAPI(
     title="Test",
    description="",
    version="0.0.1",
)

origins = ["http://localhost", "http://localhost:3000"]

app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    # allow_origins=origins,
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)


app.include_router(router, prefix="/api/v1")


if __name__ == "__main__":
    HOST = general_settings.HOST_API
    DEBUG = general_settings.DEBUG
    PORT = general_settings.PORT_API
    uvicorn.run("main:app", host="0.0.0.0", port=8000, reload=True)