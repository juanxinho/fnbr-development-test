from __future__ import annotations

from dotenv import find_dotenv
from pydantic_settings import BaseSettings
from pydantic_settings import SettingsConfigDict


class GeneralSettings(BaseSettings):
    HOST_API: str
    PORT_API: int
    MONGO_INITDB_ROOT_USERNAME: str
    MONGO_INITDB_ROOT_PASSWORD: str
    HOST_MONGO: str
    PORT_MONGO: int
    DB_MONGO: str
    
    SENDER_EMAIL: str
    HOST_MAILHOG: str
    FORWARD_MAILHOG_PORT: int
    FORWARD_MAILHOG_DASHBOARD_PORT: int

    DEBUG: bool = False

    model_config = SettingsConfigDict(
        env_file=find_dotenv(filename="../.env", usecwd=True),
        env_file_encoding="utf-8",
        extra="ignore",
    )


general_settings = GeneralSettings()
