import Navigation from '@/components/Navigation';
import { useLanguage } from '@/contexts/LanguageContext';
import { useAuth } from '@/contexts/AuthContext';
import { Sparkles, Plus, Trash2, Copy } from 'lucide-react';
import { Button } from '@/components/ui/button';
import { useState } from 'react';
import { toast } from '@/hooks/use-toast';

interface Prompt {
  id: string;
  title: string;
  content: string;
  category: string;
}

const PromptPage = () => {
  const { t } = useLanguage();
  const { isAdmin } = useAuth();
  
  const [prompts, setPrompts] = useState<Prompt[]>([
    { 
      id: '1', 
      title: 'Cinematic Scene', 
      content: 'Create a cinematic wide-angle shot of a futuristic city at sunset, with flying vehicles and neon lights reflecting off glass skyscrapers.',
      category: 'Video'
    },
    { 
      id: '2', 
      title: 'Abstract Art', 
      content: 'Generate an abstract composition featuring flowing liquid metal in silver and black tones, with dramatic lighting and reflections.',
      category: 'Image'
    },
    { 
      id: '3', 
      title: 'Ambient Music', 
      content: 'Compose an atmospheric ambient track with ethereal pads, subtle piano melodies, and deep bass undertones.',
      category: 'Audio'
    },
    { 
      id: '4', 
      title: 'Product Shot', 
      content: 'Capture a luxury product photography setup with brushed aluminum surfaces, dramatic shadows, and minimalist black background.',
      category: 'Photo'
    },
  ]);

  const handleCopy = (content: string) => {
    navigator.clipboard.writeText(content);
    toast({
      title: "Copied!",
      description: "Prompt copied to clipboard",
    });
  };

  const handleDelete = (id: string) => {
    setPrompts(prompts.filter(p => p.id !== id));
  };

  return (
    <div className="min-h-screen bg-background">
      <Navigation />
      
      <main className="pt-32 pb-20 px-6">
        <div className="container mx-auto max-w-4xl">
          {/* Header */}
          <div className="text-center mb-16 animate-fade-in-up">
            <h1 className="font-display text-4xl md:text-6xl aluminum-text mb-4">
              {t('prompt')}
            </h1>
            <p className="text-muted-foreground">{t('creativePrompts')}</p>
            <div className="w-24 h-px bg-gradient-to-r from-transparent via-aluminum to-transparent mx-auto mt-4" />
          </div>

          {/* Admin Add Button */}
          {isAdmin && (
            <div className="flex justify-end mb-8">
              <Button variant="luxury" className="gap-2">
                <Plus className="w-4 h-4" />
                Add Prompt
              </Button>
            </div>
          )}

          {/* Prompts Grid */}
          <div className="space-y-6">
            {prompts.map((prompt, index) => (
              <div
                key={prompt.id}
                className="group aluminum-surface rounded-xl p-6 md:p-8 animate-fade-in hover:glow-effect transition-all duration-300"
                style={{ animationDelay: `${index * 0.1}s` }}
              >
                <div className="flex items-start justify-between gap-4 mb-4">
                  <div className="flex items-center gap-3">
                    <div className="w-10 h-10 rounded-full bg-aluminum/10 flex items-center justify-center">
                      <Sparkles className="w-5 h-5 text-aluminum" />
                    </div>
                    <div>
                      <h3 className="font-display text-xl text-foreground group-hover:aluminum-text transition-colors">
                        {prompt.title}
                      </h3>
                      <span className="text-xs text-muted-foreground uppercase tracking-wider">
                        {prompt.category}
                      </span>
                    </div>
                  </div>
                  
                  <div className="flex items-center gap-2">
                    <Button
                      variant="ghost"
                      size="icon"
                      onClick={() => handleCopy(prompt.content)}
                      className="text-muted-foreground hover:text-foreground"
                    >
                      <Copy className="w-4 h-4" />
                    </Button>
                    
                    {isAdmin && (
                      <Button
                        variant="ghost"
                        size="icon"
                        onClick={() => handleDelete(prompt.id)}
                        className="text-destructive hover:text-destructive/80"
                      >
                        <Trash2 className="w-4 h-4" />
                      </Button>
                    )}
                  </div>
                </div>

                <p className="text-muted-foreground leading-relaxed pl-13" contentEditable={isAdmin}>
                  {prompt.content}
                </p>
              </div>
            ))}
          </div>
        </div>
      </main>
    </div>
  );
};

export default PromptPage;
