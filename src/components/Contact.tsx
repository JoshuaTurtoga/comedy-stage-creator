import { Button } from "@/components/ui/button";
import { Mail, Instagram, Twitter, Youtube } from "lucide-react";

const Contact = () => {
  return (
    <section id="contact" className="py-24 bg-background">
      <div className="container mx-auto px-4">
        <div className="max-w-3xl mx-auto text-center">
          <h2 className="font-display text-5xl md:text-6xl text-foreground mb-4">
            GET IN <span className="text-primary">TOUCH</span>
          </h2>
          <p className="text-muted-foreground mb-8">
            For booking inquiries, press, or just to say hello
          </p>

          <div className="bg-card border border-border rounded-lg p-8 mb-12">
            <h3 className="font-semibold text-foreground mb-2">Booking & Press</h3>
            <a
              href="mailto:booking@mikecollins.com"
              className="inline-flex items-center gap-2 text-primary hover:text-primary/80 transition-colors"
            >
              <Mail size={18} />
              booking@mikecollins.com
            </a>
          </div>

          <div>
            <h3 className="font-semibold text-foreground mb-6">Follow Mike</h3>
            <div className="flex justify-center gap-4">
              {[
                { icon: Instagram, label: "Instagram" },
                { icon: Twitter, label: "Twitter" },
                { icon: Youtube, label: "YouTube" },
              ].map((social, index) => (
                <a
                  key={index}
                  href="#"
                  className="w-12 h-12 bg-card border border-border rounded-full flex items-center justify-center text-muted-foreground hover:text-primary hover:border-primary hover:glow-box transition-all duration-300"
                  aria-label={social.label}
                >
                  <social.icon size={20} />
                </a>
              ))}
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default Contact;
