import { useRef } from 'react';
import { ImageIcon, Trash2 } from 'lucide-react';
import { Button } from '@/components/ui/button';
import { toast } from '@/hooks/use-toast';

interface AdminBackgroundUploaderProps {
  onUpload: (file: File) => void;
  onClear: () => void;
  hasBackground: boolean;
}

const AdminBackgroundUploader = ({ onUpload, onClear, hasBackground }: AdminBackgroundUploaderProps) => {
  const fileInputRef = useRef<HTMLInputElement>(null);

  const handleFileChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    const file = e.target.files?.[0];
    if (file) {
      onUpload(file);
      toast({
        title: "Background updated",
        description: `${file.name} set as page background`,
      });
      e.target.value = '';
    }
  };

  return (
    <div className="fixed bottom-6 right-6 z-50 flex gap-2">
      <input
        ref={fileInputRef}
        type="file"
        accept="image/*,video/*"
        className="hidden"
        onChange={handleFileChange}
      />
      <Button
        variant="luxury"
        size="sm"
        onClick={() => fileInputRef.current?.click()}
        className="gap-2 shadow-lg"
      >
        <ImageIcon className="w-4 h-4" />
        Change Background
      </Button>
      {hasBackground && (
        <Button
          variant="ghost"
          size="icon"
          onClick={onClear}
          className="bg-destructive/20 hover:bg-destructive/30 text-destructive"
        >
          <Trash2 className="w-4 h-4" />
        </Button>
      )}
    </div>
  );
};

export default AdminBackgroundUploader;
