import { Toaster } from "@/components/ui/toaster";
import { Toaster as Sonner } from "@/components/ui/sonner";
import { TooltipProvider } from "@/components/ui/tooltip";
import { QueryClient, QueryClientProvider } from "@tanstack/react-query";
import { BrowserRouter, Routes, Route, useLocation } from "react-router-dom";
import { LanguageProvider } from "@/contexts/LanguageContext";
import { AuthProvider } from "@/contexts/AuthContext";
import Welcome from "./pages/Welcome";
import Home from "./pages/Home";
import About from "./pages/About";
import Videos from "./pages/Videos";
import Music from "./pages/Music";
import Prompt from "./pages/Prompt";
import AdminLogin from "./pages/AdminLogin";
import Admin from "./pages/Admin";
import Performance from "./pages/Performance";
import NotFound from "./pages/NotFound";
import SocialLinks from "./components/SocialLinks";

const queryClient = new QueryClient();

const AppContent = () => {
  const location = useLocation();
  const isWelcomePage = location.pathname === '/';

  return (
    <>
      <Routes>
        <Route path="/" element={<Welcome />} />
        <Route path="/home" element={<Home />} />
        <Route path="/about" element={<About />} />
        <Route path="/videos" element={<Videos />} />
        <Route path="/music" element={<Music />} />
        <Route path="/prompt" element={<Prompt />} />
        <Route path="/admin-login" element={<AdminLogin />} />
        <Route path="/admin" element={<Admin />} />
        <Route path="/performance" element={<Performance />} />
        <Route path="*" element={<NotFound />} />
      </Routes>
      {!isWelcomePage && <SocialLinks />}
    </>
  );
};

const App = () => (
  <QueryClientProvider client={queryClient}>
    <LanguageProvider>
      <AuthProvider>
        <TooltipProvider>
          <Toaster />
          <Sonner />
          <BrowserRouter>
            <AppContent />
          </BrowserRouter>
        </TooltipProvider>
      </AuthProvider>
    </LanguageProvider>
  </QueryClientProvider>
);

export default App;
