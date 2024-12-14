// script.js for main page
document.addEventListener('DOMContentLoaded', () => {
    // Add any additional scripts or interactivity here.
});
const {
    GoogleGenerativeAI,
    HarmCategory,
    HarmBlockThreshold,
  } = require("@google/generative-ai");
  
  const apiKey = process.env.AIzaSyDKe_Gn7qmDLAhbPyDv3HPD_JmLgxfT1R8;
  const genAI = new GoogleGenerativeAI(AIzaSyDKe_Gn7qmDLAhbPyDv3HPD_JmLgxfT1R8);
  
  const model = genAI.getGenerativeModel({
    model: "gemini-1.5-flash",
  });
  
  const generationConfig = {
    temperature: 1,
    topP: 0.95,
    topK: 64,
    maxOutputTokens: 8192,
    responseMimeType: "text/plain",
  };
  
  async function run() {
    const chatSession = model.startChat({
      generationConfig,
      history: [
      ],
    });
  
    const result = await chatSession.sendMessage("INSERT_INPUT_HERE");
    console.log(result.response.text());
  }
  
  run();