from typing import Optional
from pydantic import BaseModel

class StageModel(BaseModel):
    id: int
    name: str
    iso2: Optional[str] = None

class InformationForm(BaseModel):
    knowledgeAreas: str
    program: str
    names: str
    lastNames: str
    email: str
    phone: str
    countryOfResidence: StageModel
    state: StageModel
    city: StageModel
    comments: Optional[str] = None
    acceptPrivacyPolicy: bool
    
