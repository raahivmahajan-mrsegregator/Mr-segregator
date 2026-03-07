export default {
  async fetch(request, env) {
    if (request.url.includes("/proxy")) {
      const geminiUrl = `https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash-lite:generateContent?key=${env.GEMINI_KEY}`;
      const body = await request.json();
      const response = await fetch(geminiUrl, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(body)
      });
      return response;
    }
    return new Response("Not found", { status: 404 });
  }
}